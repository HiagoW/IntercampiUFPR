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
      
      //maps
      var maps = new Object();
          var maps = {
              "agrarias": "https://goo.gl/maps/fNEw6uQsx5u",
              "artes": "https://goo.gl/maps/c8WXiSfkJST2",
              "botanico": "https://goo.gl/maps/tu61GwizR8N2",
              "comunicacao": "https://goo.gl/maps/XWbbFB3kiR62",
              "poli": "https://goo.gl/maps/DoJ8fTy2rQB2",
              "prae": "https://goo.gl/maps/4x2yKgAnhiv",
              "reboucas-c": "https://goo.gl/maps/oRzofkYV8EU2",
              "reboucas-jn": "https://goo.gl/maps/Dx4Hnb8i6Jt",
              "reitoria": "https://goo.gl/maps/ftNKFWXGQeQ2",
              "sept": "https://goo.gl/maps/1JuBxu2zeXz",
              "reboucas": "https://goo.gl/maps/wbuQUbxVroP2"
            };
      
      

      var dados1 = {!! $horarios !!};
      
      //INTERCAMPI 2
      var dados2 = [
      ["06:50", campus[0]],
      ["06:55", campus[8]],
      ["07:05", campus[7]],
      ["07:20", campus[2]],
      ["07:35", campus[4]],
      ["07:40", campus[9]],
      ["07:50", campus[6]],
      ["08:00", campus[0], "c"],
      ["09:30", campus[0]],
      ["09:35", campus[5]],
      ["09:40", campus[8]],
      ["09:50", campus[3]],
      ["10:00", campus[0]],
      ["10:20", campus[2]],
      ["10:40", campus[4]],
      ["10:45", campus[9]],
      ["11:10", campus[0]],
      ["11:30", campus[2]],
      ["11:40", campus[4]],
      ["11:45", campus[9]],
      ["12:00", campus[8]],
      ["12:10", campus[0], "c"],
      ["12:40", campus[0]],
      ["12:45", campus[5]],
      ["12:50", campus[8]],
      ["13:10", campus[2]],
      ["13:15", campus[4]],
      ["13:20", campus[9]],
      ["13:45", campus[8]],
      ["13:50", campus[0], "c"],
      ["14:30", campus[0]],
      ["14:50", campus[2]],
      ["15:10", campus[4]],
      ["15:15", campus[9]],
      ["15:30", campus[2]],
      ["16:30", campus[8]],
      ["16:40", campus[3]],
      ["17:00", campus[0]],
      ["17:20", campus[2]],
      ["17:40", campus[4]],
      ["17:45", campus[9]],
      ["18:15", campus[8]],
      ["18:30", campus[7]],
      ["18:45", campus[0], "c"]
      ];

      //INTERCAMPI 4
      var dados4 = [
      ["06:55", campus[0]],
      ["07:05", campus[8]],
      ["07:15", campus[1]],
      ["07:30", campus[8]],
      ["07:50", campus[2]],
      ["08:25", campus[4]],
      ["08:30", campus[9]],
      ["08:50", campus[0]],
      ["09:15", campus[1]],
      ["09:40", campus[8]],
      ["09:50", campus[3]],
      ["10:00", campus[0]],
      ["10:20", campus[2]],
      ["10:40", campus[4]],
      ["10:45", campus[9]],
      ["11:00", campus[0]],
      ["11:20", campus[2]],
      ["11:30", campus[4]],
      ["11:35", campus[9]],
      ["12:00", campus[8]],
      ["12:15", campus[1]],
      ["12:30", campus[8]],
      ["12:40", campus[0], "c"],
      ["13:05", campus[0]],
      ["13:15", campus[8]],
      ["13:30", campus[1]],
      ["13:45", campus[8]],
      ["14:00", campus[0], "c"],
      ["14:30", campus[0]],
      ["14:50", campus[2]],
      ["15:10", campus[4]],
      ["15:15", campus[9]],
      ["15:30", campus[2]],
      ["16:00", campus[1]],
      ["16:30", campus[8]],
      ["16:40", campus[3]],
      ["17:00", campus[0]],
      ["17:20", campus[2]],
      ["17:40", campus[4]],
      ["17:45", campus[9]],
      ["17:55", campus[10]],
      ["18:20", campus[8]],
      ["18:30", campus[3]],
      ["18:50", campus[0]],
      ["19:10", campus[8]],
      ["19:30", campus[1]],
      ["19:50", campus[8]],
      ["20:00", campus[0], "c"]
      ];

      //INTERCAMPI EXTRA
      var dadosExtra = [
      ["06:45", campus[8]],
      ["06:55", campus[2]],
      ["07:00", campus[4]],
      ["07:15", campus[8]],
      ["07:30", campus[0], "c"],
      ["11:45", campus[4]],
      ["11:50", campus[9]],
      ["12:50", campus[8], "c"],
      ["15:25", campus[8]],
      ["15:35", campus[2]],
      ["15:45", campus[4]],
      ["16:05", campus[8], "c"],
      ["18:05", campus[8]],
      ["18:25", campus[2]],
      ["18:30", campus[4]],
      ["18:50", campus[8], "c"],
      ];

      //INTERCAMPI 3 (Sábado)
      var dados3 = [
          ["06:30", campus[0]],
          ["06:45", campus[8]],
          ["06:55", campus[2]],
          ["07:05", campus[4]],
          ["07:20", campus[3]],
          ["07:25", campus[0]],
          ["07:40", campus[2]],
          ["08:00", campus[4]],
          ["08:25", campus[8]],
          ["09:00", campus[0],"c"],
          ["11:00", campus[0]],
          ["11:10", campus[8]],
          ["11:25", campus[2]],
          ["11:30", campus[4]],
          ["11:50", campus[8]],
          ["12:00", campus[0], "c"],
          ];
      //cont - Vai controlar inicio e fim do itinerario
      //string - vai montar o itinerario
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
                  resultado += "<hr><div class='container-fluid'> <div class='row justify-content-center'> <div class='col-12'><h3 class='titulo'>Intercampi 1</h3></div></div></div>";
                  montarItinerario(dados1);
                  resultado += "<hr><div class='container-fluid'> <div class='row justify-content-center'> <div class='col-12'><h3 class='titulo'>Intercampi 2</h3></div></div></div>";
                  montarItinerario(dados2);
                  resultado += "<hr><div class='container-fluid'> <div class='row justify-content-center'> <div class='col-12'><h3 class='titulo'>Intercampi 4</h3></div></div></div>";
                  montarItinerario(dados4);
                  resultado += "<hr><div class='container-fluid'> <div class='row justify-content-center'> <div class='col-12'><h3 class='titulo'>Intercampi Extra</h3></div></div></div>";
                  montarItinerario(dadosExtra);
                  resultado += "<hr><div class='container-fluid'> <div class='row justify-content-center'> <div class='col-12'><h3 class='titulo'>Intercampi 3 (Sábado)</h3></div></div></div>";
                  montarItinerario(dados3);
                  $("#resultado").append(resultado);
                  resultado='';
                  $('[data-toggle="popover"]').popover();
                  $('.popover-dismiss').popover({
                      trigger: 'focus'
                    })
      }
      function montarItinerario(dados) {
          string = '';
          popover = '';
          cont = false;
          //controle se tem popover no meio
          contpop=false;
          //salva o estado da var resultado para depois verificar se houve mudança
          estadoRes = resultado;
          dados.forEach(elemento => {
              if (cont == true) {
                  if(destino!=elemento["campus"]){
                      popover+="<p>"+dict[elemento["campus"]]+": "+elemento["horario"]+"</p>";
                  }//se o onibus recolhe (existe elemento[2]), ignora
                  if (elemento["chegada"] !== null) {
                      string = '';
                      popover='';
                      cont = false;
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
                      if (elemento["chegada"] !== null) {
                          string = '';
                          popover='';
                          cont = false;
                      }
                      resultado += string;
                      string = '';
                      cont = false;
                      contpop = false;
                  }
              }
              //Se achar a origem, inicia itinerario
              if (origem == elemento["campus"] && elemento["chegada"] === null) {
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
          <option value="agrarias">Agrárias</option>
          <option value="botanico">Botânico</option>
          <option value="comunicacao">Comunicação</option>
          <option value="artes">DeArtes</option>
          <option value="poli">Politécnico</option>
          <option value="prae">Prae</option>
          <option value="reboucas">Rebouças</option>
          <option value="reboucas-c">Rebouças-Cassol</option>
          <option value="reboucas-jn">Rebouças-JN</option>
          <option value="reitoria">Reitoria</option>
          <option value="sept">SEPT</option>
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
          <option value="agrarias">Agrárias</option>
          <option value="botanico">Botânico</option>
          <option value="comunicacao">Comunicação</option>
          <option value="artes">DeArtes</option>
          <option value="poli">Politécnico</option>
          <option value="prae">Prae</option>
          <option value="reboucas">Rebouças</option>
          <option value="reboucas-c">Rebouças-Cassol</option>
          <option value="reboucas-jn">Rebouças-JN</option>
          <option value="reitoria">Reitoria</option>
          <option value="sept">SEPT</option>
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