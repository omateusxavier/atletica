<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Global Site Tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110006118-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments)
  };
  gtag('js', new Date());

  gtag('config', 'UA-110006118-1');
  </script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fundação Educacional Dr Raul Bauab
  </title>
  </title>
  <link href="<?php echo base_url('assets/novo/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link rel="icon" type="image/png" href="<?php echo base_url('imagens/favicon.ico'); ?>">
  <link href="<?php echo base_url('assets/novo/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/selectbox/select_option1.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/flexslider/flexslider.css'); ?>" type="text/css"
    media="screen" />
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/calender/fullcalendar.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/animate.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/pop-up/magnific-popup.css'); ?>">
  <link rel="stylesheet" type="text/css"
    href="<?php echo base_url('assets/novo/plugins/rs-plugin/css/settings.css'); ?>" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/owlcarousel/owl.carousel.min.css'); ?>"
    media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/owlcarousel/owl.theme.default.min.css'); ?>"
    media="screen">
  <link href="<?php echo base_url('assets/google/css361f.css?family=Open+Sans:400,600,600italic,400italic,700'); ?>"
    rel='stylesheet' type='text/css'>
  <link href="<?php echo base_url('assets/google/css83d9.css?family=Roboto+Slab:400,700'); ?>" rel='stylesheet'
    type='text/css'>
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/css/default.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/css/swiper.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/options/optionswitch.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.css'); ?>">

  <script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('#btn_acessorapido').trigger('click');
  });
  </script>
</head>
<style>
#AcessoRapido {
  z-index: 9999;
  position: fixed;
  bottom: 30px;
  right: 20px;
  display: none;

}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}

.btn-circle.btn-xl {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
}
</style>
<style>
.camada {
  width: 100%;
  height: 100%;
  position: absolute;
  z-index: 999;
  opacity: 0.6;
  background: -moz-radial-gradient(center, ellipse cover, rgba(51, 122, 183, 0) 0%, rgba(51, 122, 183, 1) 76%, rgba(51, 122, 183, 1) 100%);
  background: -webkit-radial-gradient(center, ellipse cover, rgba(51, 122, 183, 0) 0%, rgba(51, 122, 183, 1) 76%, rgba(51, 122, 183, 1) 100%);
  background: radial-gradient(ellipse at center, rgba(51, 122, 183, 0) 0%, rgba(51, 122, 183, 1) 76%, rgba(51, 122, 183, 1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00820b21', endColorstr='#820b21', GradientType=1);
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}




@media only screen and (max-width: 767px) {
  #tapume {
    position: absolute;
    top: 20%;
    z-index: 999;
    width: 100%;
    text-align: center;
  }

  #tapume img {

    display: block;
    margin: 0 auto auto auto;
    text-align: center;
  }

  ul {
    list-style-type: none;
    margin: 0;
    padding-left: 15px;
    overflow: hidden;
  }

  li {
    float: left;
  }

  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

  .icones-home {
    padding-bottom: 20px;
  }
}

@media only screen and (min-width: 768px) {
  #tapume {
    position: absolute;
    z-index: 9999;
    left: 50%;
    top: 60%;
    width: 100%;
    transform: translate(-50%, -50%);
  }

  ul {
    list-style-type: none;
    margin: 0;
    padding-left: 10px;
    overflow: hidden;
  }

  li {
    float: left;
  }

  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }
}

header {
  position: relative;
  background-color: black;
  height: 75vh;
  min-height: 25rem;
  width: 100%;
  overflow: hidden;
}

header video {
  position: absolute;
  top: 60%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: 0;
  -ms-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
}

header .container {
  position: relative;
  z-index: 2;
}

header .overlay {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: black;
  opacity: 0.3;
  z-index: 1;
}

/* Media Query for devices withi coarse pointers and no hover functionality */

/* This will use a fallback image instead of a video for devices that commonly do not support the HTML5 video element */

@media (pointer: coarse) and (hover: none) {
  header {
    background: url('<?php echo base_url('imagens/fallback.jpg'); ?>') black no-repeat center center scroll;
  }

  header video {
    display: none;
  }
}
</style>


<body style="background-color: #1f4d77">
  <nav class="navbar navbar-expand-lg navbar-light navbar-dark" style="background-color: #1f4d77">
    <div class="mx-auto text-center">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('colegio'); ?>"><i class="fa fa-graduation-cap"
                aria-hidden="true"></i> Colégio da Fundação <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('integradas'); ?>"><i class="fa fa-graduation-cap"
                aria-hidden="true"></i> Faculdades Integradas de Jaú</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('portais'); ?>"><i class="fa fa-share-alt"
                aria-hidden="true"></i> Acesso a Portais</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('trabalheconosco'); ?>"><i class="fa fa-handshake-o"
                aria-hidden="true"></i> Trabalhe Conosco</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('colegio/Ouvidoria'); ?>"><i class="fa fa-share"
                aria-hidden="true"></i> Ouvidoria</a>
          </li>

        </ul>

      </div>
    </div>
  </nav>
  <header>

    <!-- This div is  intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
    <div class="overlay"></div>

    <!-- The HTML5 video element that will create the background video on the header -->
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
      <source src="<?php echo base_url(); ?>assets/videos/003.mp4" type="video/mp4">
    </video>

    <!-- The header content -->
    <div class="container h-100">
      <div class="d-flex h-100 text-center align-items-center">
        <div class="w-100 text-white">
          <h1 class="display-3"><img style="padding-left: 20px; padding-right: 20px"
              alt="A melhor e maior Instituição de Ensino de Jaú e Região"
              src="<?php echo base_url('imagens/logo-instituicao.png'); ?>"></h1><br>
          <p class="lead mb-0">Fundação Educacional Dr Raul Bauab</p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page section example for content below the video header -->
  <section class="my-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto">

        </div>
      </div>
    </div>
  </section>

  <div class="dropup" id="AcessoRapido">
    <button id="btn_acessorapido" class="btn btn-danger dropdown-toggle btn-circle btn-xl" type="button"
      data-toggle="dropdown" data-placement="bottom" title="Acesso Rápido"><i class="fa fa-hand-pointer-o fa-3x fa-fw"
        style="font-size:24px"></i><span class="caret"></span></button>
    </button>
    <ul class="dropdown-menu dropdown-menu-right">
      <li><a href="http://portal.fundacaojau.edu.br:8077/sif2/aluno"><i class="fa fa-user-circle"
            aria-haspopup="true"></i> Portal do Aluno</a></li>
      <li><a href="http://portal.fundacaojau.edu.br:8077/sif2/professor"><i class="fa fa-users"></i> Portal do
          Professor</a></li>
      <li><a href="http://portal.fundacaojau.edu.br:8077/sif2/PortalColaborador"><i class="fa fa-user-circle"></i>
          Portal do Colaborador</a></li>
      <li><a href="https://webmail-seguro.com.br/fundacaojau.edu.br/v2/"><i class="fa fa-envelope"></i> Email
          Colaborador</a></li>
      <!--<li><a href="#"><i class="fa fa-money"></i> 2ª Via de Boleto</a></li>-->
      <li><a href="<?php echo base_url('colegio/pagina/trabalhe-conosco-141'); ?>"><i class="fa fa-briefcase"></i>
          Trabalhe Conosco</a></li>
      <li><a href="<?php echo base_url('colegio/Ouvidoria/2'); ?>"><i class="fa fa-weixin"></i> Ouvidoria</a></li>
      <!--<li class="btn btn-warning"><a href="<?php //echo base_url('integradas/vestibular'); ?>" target='_blank'><i class="fa fa-spinner fa-pulse fa-fw"></i> <b>Inscrição Vestibular</b></a></li> -->
    </ul>
  </div>

  <script src="<?php echo base_url('assets/js/canvas.js'); ?>"></script>
  <script>
  jQuery(function($) {
    var escolha = Math.floor(Math.random() * 6);

    if (escolha == 0) {
      $("#my-video").html("<source src='<?php echo base_url(); ?>assets/videos/003.mp4' type='video/mp4'>");
    } else if (escolha == 1) {
      $("#my-video").html("<source src='<?php echo base_url(); ?>assets/videos/003.mp4' type='video/mp4'>");
    } else if (escolha == 2) {
      $("#my-video").html("<source src='<?php echo base_url(); ?>assets/videos/003.mp4' type='video/mp4'>");
    } else if (escolha == 3) {
      $("#my-video").html("<source src='<?php echo base_url(); ?>assets/videos/003.mp4' type='video/mp4'>");
    } else if (escolha == 4) {
      $("#my-video").html("<source src='<?php echo base_url(); ?>assets/videos/003.mp4' type='video/mp4'>");
    } else {
      $("#my-video").html("<source src='<?php echo base_url(); ?>assets/videos/003.mp4' type='video/mp4'>");
    }
  });
  var isIOS = /iPad|iPhone|iPod/.test(navigator.platform);
  var isANDROID = /Android/.test(navigator.platform);

  if (isIOS || isANDROID) {
    var canvasVideo = new CanvasVideoPlayer({
      videoSelector: '.videofull',
      canvasSelector: '.canvas',
      timelineSelector: false,
      autoplay: true,
      makeLoop: true,
      pauseOnClick: false,
      audio: false
    });
  } else {
    // Use HTML5 video
    document.querySelectorAll('.canvas')[0].style.display = 'none';
  }
  </script>
  <style>
  .canvas {
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    background: #000;
    z-index: 5;
  }
  </style>

  <div id="modal_trabalheconosco" class="modal fade" role="dialog" style="z-index:9999">

    <form id="form_login" action="<?php echo base_url(); ?>" method="post">
      <div class="modal-dialog">

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Trabalhe conosco</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                Edital 001/2019 - Professor de Xadrez - <a target="_blank"
                  href="http://portal.fundacaojau.edu.br:8077/trabalheconosco/Classificacao_Final_Xadrez.pdf">Classificação
                  Final</a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                Edital 002/2019 - Professor Ciências Biológica - <a target="_blank"
                  href="http://portal.fundacaojau.edu.br:8077/trabalheconosco/Classificacao_Final_Ciencias.pdf">Classificação
                  Final</a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                Edital 002/2019 - LÍNGUA ESTRANGEIRA - INGLÊS - <a target="_blank"
                  href="http://portal.fundacaojau.edu.br:8077/trabalheconosco/ENTREVISTA_002_ingles.pdf">Entrevista e
                  Aula Expositiva.</a>
              </div>
            </div>



            <div class="row">
              <div class="col-md-12">
                Edital 003/2019 - MONITOR - <a target="_blank"
                  href="http://portal.fundacaojau.edu.br:8077/trabalheconosco/convocacaoedital_003-2019.pdf">Convocação
                  para Prova Situacional</a>
              </div>
            </div>



            <div class="row">
              <div class="col-md-12">
                Edital 004/2019 - Professor de curso pré vestibular / cursinho - <a target="_blank"
                  href="http://portal.fundacaojau.edu.br:8077/trabalheconosco/Classificacao_Final_Pre_Vestibular.pdf">Classificação
                  Final</a>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
        </div>

      </div>
    </form>
  </div>

</body>
<!-- JQUERY SCRIPTS -->
<script src="<?php echo base_url('assets/novo/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="<?php echo base_url('assets/novo/plugins/bootstrap/js/bootstrap_4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/flexslider/jquery.flexslider.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/rs-plugin/js/jquery.themepunch.tools.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/selectbox/jquery.selectbox-0.1.3.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/pop-up/jquery.magnific-popup.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/animation/waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/count-up/jquery.counterup.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/animation/wow.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/animation/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/animation/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/calender/fullcalendar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/owlcarousel/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/timer/jquery.syotimer.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/plugins/smoothscroll/SmoothScroll.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/js/custom.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/js/swiper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.js'); ?>"></script>
<script src="https://www.grupozamon.com.br/assets/home/js/jquery-migrate-3.0.1.min.js"></script>

</html>