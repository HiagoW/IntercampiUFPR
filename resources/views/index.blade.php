<!doctype html>
<!--
Desenvolvido por: Hiago William Petris e Leonardo Barbosa Marques, 
alunos do curso de Análise e Desenvolvimento de Sistemas da Univeresidade Federal do Paraná.
Identidade Visual: Laís Ponciano Andrade, aluna do curso de Comunicação Institucional da Universidade Federal do Paraná.
-->
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins|Comfortaa|Fjalla+One" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>IntercampiUFPR</title>

  <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
  <link rel="icon" href="imgs/favicon.ico" type="image/x-icon">

  <script src="js/app.js"></script>
  <script>
      //Campus
      var campus = {!! $campi !!};
      
      //Linhas
      var linhas = {!! $linhas !!};

      //maps
      var maps = {!! $maps !!};
      
      

      var dados = {!! $horarios !!};
      
      var origem = null, destino = null, resultado='';
      var dict = new Object();
          var dict = {
              "agrarias": "Agrárias",
              "artes": "DeArtes",
              "botanico": "Botânico",
              "comunicacao": "Comunicação",
              "poli": "Politécnico",
              "prae": "Prae",
              "reboucas-c": "Rebouças-Cassol",
              "reboucas-jn": "Rebouças-JN",
              "reitoria": "Reitoria",
              "sept": "SEPT",
              "reboucas": "Rebouças"
            };
      $(document).ready(function () {
          $("#origem").change(function () {
              origem = $(this).children("option:selected").val();
              $("#linkMapOrig").attr("href",maps[origem]);
              $("#linkMapOrig").attr("target","_blank");
              if (destino == origem) {
                  $("#resultado").html('<div class="row justify-content-center"> <div class="col-10 alert alert-warning" role="alert"> Destino e origem devem ser diferentes. </div> </div>');
              }else if(destino!=null){
                  montarResultado();
              }
          });

          $("#destino").change(function () {
              destino = $(this).children("option:selected").val();
              $("#linkMapDest").attr("href",maps[destino]);
              $("#linkMapDest").attr("target","_blank");
              if (destino == origem) {
                  $("#resultado").html('<div class="row justify-content-center"> <div class="col-10 alert alert-warning" role="alert"> Destino e origem devem ser diferentes. </div> </div>');
              } else if(origem!=null){
                montarResultado(); 
              }
          });

          $("#linkMapOrig").click(function () {
              if(origem == null){
                  $("#resultado").html('<br><div class="row justify-content-center"> <div class="col-10 alert alert-danger" role="alert"> A origem deve ser selecionada antes. </div></div>');
              }
          });

          $("#linkMapDest").click(function () {
              if(destino == null){
                  $("#resultado").html('<br><div class="row justify-content-center"> <div class="col-10 alert alert-danger" role="alert"> O destino deve ser selecionado antes. </div></div>');
              }
          });
      });
      function montarResultado(){
                  montaIndicacaoParada();
                  $('[data-toggle="popover"]').popover('hide');
                  $("#resultado").empty();
                  linhas.forEach(linha => {
                    if(linha["situacao"]=='m'){
                      resultado += "<hr><div class='container-fluid'> <div class='row justify-content-center'> <div class='col-12'><h3 class='titulo'>"+linha["nomeLinha"]+" em manutenção!</h3></div></div></div>";
                    }else{
                    resultado += "<hr><div class='container-fluid'> <div class='row justify-content-center'> <div class='col-12'><h3 class='titulo'>"+linha["nomeLinha"]+"</h3></div></div></div>";
                    montarItinerario(dados, linha);
                    }
                  });
                  $("#resultado").append(resultado);
                  resultado='';
                  $('[data-toggle="popover"]').popover();
                  $('.popover-dismiss').popover({
                      trigger: 'focus'
                    })
      }
      function montarItinerario(dados, linha) {
        var dadosLinha = new Array();
        dados.forEach(dado => {
          if(dado["linha"]==linha["nomeLinha"]){
            dadosLinha.push(dado);
          }
        });  
        //cont - Vai controlar inicio e fim do itinerario
        //string - vai montar o itinerario
          string = '';
          popover = '';
          cont = false;
          //controle se tem popover no meio
          contpop=false;
          //salva o estado da var resultado para depois verificar se houve mudança
          estadoRes = resultado;
          dadosLinha.forEach(elemento => {
              if (cont == true) {
                  if(destino!=elemento["campus"]){
                      popover+="<p>"+dict[elemento["campus"]]+": "+elemento["horario"]+"</p>";
                      //se o onibus recolhe (existe elemento[2]), ignora
                      if (elemento["chegada"] == 'c') {
                        string = '';
                        popover='';
                        cont = false;
                      }
                  }
                  //Quando chega no destino, da append no itinerario, zera string
                  //zera cont e sai da funcao
                  if (destino == elemento["campus"]) {
                      if(popover!==''){
                          contpop=true;
                          string+='<div class="col-2 divIti"> <a tabindex="0" html="true" data-html="true" class="btn" role="button" data-toggle="popover" data-trigger="focus" title="Paradas" data-content="'+popover+'"><img class="paradas" src="./imgs/icon2.png"/></a></div>';
                          popover='';
                      }else{
                          string+='<div class="col-2 divIti"></div>';
                      }
                      string += '<div id="destino" class="destino col-5"> <span>' + dict[elemento["campus"]] + '</span><p>' + elemento["horario"] + '</p><img class="setas" src="./imgs/seta1.png"></div></div></div></div></div>';
                      /*if(!contpop){
                          string=string.replace("origem col-5","origem col-6");
                          string=string.replace("destino col-5","destino col-6");
                      }*/
                      resultado += string;
                      string = '';
                      cont = false;
                      contpop = false;
                  }
              }
              //Se achar a origem, inicia itinerario
              if (origem == elemento["campus"] && elemento["chegada"] == null) {
                  popover='';
                  string = '';
                  string += '<div class="container-fluid"><div class="row iti"> <div id="origem" class="origem col-5"> <span>' + dict[elemento["campus"]] + '</span><p>' + elemento["horario"] + '</p><img class="setas" src="./imgs/seta2.png"></div>';
                  cont = true;
              }
          });
          if(estadoRes===resultado){
              resultado+="<p class='semhorario'>Não há horários para esta linha.</p>";
          }
      }

      function montaIndicacaoParada(){
          $(".rowIndicParada").html("");
          $(".rowIndicParada").append('<img class="indicParada" src="./imgs/icon2.png"> <span class="spanParada">Este ícone indica que há paradas no caminho. Clique para ver os detalhes.</span>');
      }        
  </script>
  <script src="js/script.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row justify-content-center ">
      <div class="col-12 divLogo">
        <img src="imgs/logo.png" class="img-fluid">
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-12 subHeader">
        <!--<p>Bem vindo ao site Intercampi UFPR, acompanhe os horários e o destino dos ônibus</p>-->
      </div>
    </div>
  </div>

  <div class="container-fluid select">
    <p class="labelDesc">SELECIONE A ORIGEM E O DESTINO</p>
    <div class="container-fluid">
      <div class="row justify-content-center rowIndicMap">
        <img class="indicIconMap" src="imgs/mapOrigem.png"> 
        <span class="spanMap">Clique para ver a localização do câmpus.</span>
      </div>
    </div>
    <div class="row">
      <div class="col-6 col-md-4 offset-2 offset-md-4">
        <select name="origem" id="origem" class="custom-select">
          <option selected disabled>Origem</option>
          @foreach($campi2 as $campus)
          <option value={{$campus->sigla}}>{{$campus->nomeCampus}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-2 divIconMap">
        <a id="linkMapOrig" href="#"><img id="mapOrigem" class="iconMap" src="imgs/mapOrigem.png"></a>
      </div>
    </div>
  </div>

  <div class="container-fluid select2">
    <div class="row">
      <div class="col-6 col-md-4 offset-2 offset-md-4">
        <select name="destino" id="destino" class="custom-select">
            <option selected disabled>Destino</option>
            @foreach($campi2 as $campus)
            <option value={{$campus->sigla}}>{{$campus->nomeCampus}}</option>
            @endforeach
        </select>
      </div>
      <div class="col-2 divIconMap">
        <a id="linkMapDest" href="#"><img id="mapDestino" class="iconMap" src="imgs/mapDestino.png"></a>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row justify-content-center rowIndicParada">
      
    </div>
  </div>

  <div id="resultado">

  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 subHeader">
      </div>
    </div>
  </div>
  <!--<div class="container-fluid divFeed">
    
  </div>-->

  <div class="rodape">
    <div class="container">
      <div class="row">
          <div class="col-12 div-btn-feed">
            <a href="https://forms.gle/5wiJiAoVjCtD9q3J7" target="_blank"><button type="button"
                class="btn btn-info btn-feed float-right">Feedback</button></a>
          </div>
        </div>
      </div>
    <footer>
      <p>Este site não possui vínculo direto com a UFPR. Os horários das linhas são retirados <a target="_blank"
          href="http://www.pra.ufpr.br/portal/centran/sobre/onibus-intercampi/">deste site</a>. Em caso de alteração,
        podem estar temporariamente desatualizados.</p>
    </footer>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>