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