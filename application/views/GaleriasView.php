<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <!-- Facebook Pixel Code -->
  <script>
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '430222264442524');
  fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" src="https://www.facebook.com/tr?id=430222264442524&ev=PageView
&noscript=1" />
  </noscript>
  <!-- End Facebook Pixel Code -->
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
  <title>Fundação Educacional Dr Raul Bauab - Galerias</title>
  <link rel="icon" type="image/png" href="<?php echo base_url('imagens/favicon.ico'); ?>">
  <link href="<?php echo base_url('assets/novo/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/selectbox/select_option1.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/flexslider/flexslider.css'); ?>" type="text/css"
    media="screen" />
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/calender/fullcalendar.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/animate.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/pop-up/magnific-popup.css'); ?>">
  <link rel="stylesheet" type="text/css"
    href="<?php echo base_url('assets/novo/plugins/rs-plugin/css/settings.css'); ?>" media="screen">
  <link rel="stylesheet" type="text/css"
    href="<?php echo base_url('assets/novo/plugins/owl-carousel/owl.carousel.css'); ?>" media="screen">
  <link href="<?php echo base_url('assets/google/css361f.css?family=Open+Sans:400,600,600italic,400italic,700'); ?>"
    rel='stylesheet' type='text/css'>
  <link href="<?php echo base_url('assets/google/css83d9.css?family=Roboto+Slab:400,700'); ?>" rel='stylesheet'
    type='text/css'>
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/novo/css/default.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.css'); ?>">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
  div.desc {
    padding: 5px;
    /*text-align: center;*/
  }

  li.img {
    position: relative;
  }

  li.img>img {
    width: 100%;
    height: 100%
  }

  li.img>div {
    position: absolute;
    left: 0%;
    margin-left: 0px;
    margin-bottom: 0px;
    bottom: 0;
    background-color: black;
    width: 100%;
    height: auto;
    color: #FFF;
    font-size: 11px;
    opacity: 0.8;
  }

  }

  #close {
    float: right;
  }

  .white-content {
    position: fixed;
    top: 60px;
    left: 5%;
    transform: translate(0%, 0%);
    padding: 16px;
    background-color: #222;
    z-index: 999;
    overflow: auto;
    width: 90%;
    height: 90%;
  }

  #overlay {
    background-color: rgba(0, 0, 0, .5);
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    position: fixed;
  }

  .advertise {
    background: #5DB0EE;
    color: #fff;
    font-size: 80px;
    text-align: center;
  }
  </style>

</head>

<body class="body-wrapper">
  <!-- Load Facebook SDK for JavaScript -->

  <div class="main_wrapper">

    <?php include('MenuView.php'); ?>

    <div class="custom_content clearfix">
      <div class="container">
        <h3>Galerias <span class="fa-stack">
            <span class="fa fa-circle fa-stack-2x"></span>
            <strong class="fa-stack-1x">
              <p style="color: #fff; font-size: 11px;"><?php echo count($galerias); ?></p>
            </strong>
          </span>
        </h3>
        <hr>

        <div class="photo_gallery custom">
          <ul class="gallery">
            <?php
                      foreach($galerias as $g){
                        if($g->capa != null){
                            $thumbnail = explode(".", $g->capa);
                            
                            $img = base_url('imagens/galerias/'.$g->id.'/'.$thumbnail[0].'_thumb.'.$thumbnail[1]);
                            }else {
                              $img = base_url('imagens/galerias/semcapa.jpg');
                            } ?>
            <li class="img">
              <a class="abrir_galeria" data-idgaleria="<?php echo $g->id; ?>" href="#">
                <img width="100%" class="img-responsive" style="border: #999 Solid 1px;" src="<?php echo $img; ?>"
                  alt="<?php echo $g->capa; ?>" title="<?php echo $g->galeria; ?>" />
                <div class="overlay">
                  <span class="zoom">
                    <i class="fa fa-camera"> <b><?php echo $g->qtd_fotos; ?> </b></i><br>

                  </span>
                </div>
              </a>
              <div class="div desc text-justify">
                <center><?php echo $g->galeria; ?></center>
              </div>

            </li>
            <?php } ?>
          </ul>
        </div>
        <!-- Fim da photo_gallery custom -->

      </div>
    </div>
    <div id="adonsite" style="display:none">
      <div class="white-content">
        <button id="close" class="btn btn-link"><i class="fa fa-close"></i> Fechar</button>
        <div id="carregar_frame"></div>
      </div>
    </div>
    <div id="overlay" style="display:none"></div>

    <?php include('FooterView.php'); ?>

  </div>

  <!-- JQUERY SCRIPTS -->
  <script src="<?php echo base_url('assets/novo/plugins/jquery/jquery-1.11.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/flexslider/jquery.flexslider.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/rs-plugin/js/jquery.themepunch.tools.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js'); ?>">
  </script>
  <script src="<?php echo base_url('assets/novo/plugins/selectbox/jquery.selectbox-0.1.3.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/pop-up/jquery.magnific-popup.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/animation/waypoints.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/count-up/jquery.counterup.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/animation/wow.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/animation/moment.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/owl-carousel/owl.carousel.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/timer/jquery.syotimer.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/smoothscroll/SmoothScroll.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/js/custom.js'); ?>"></script>
  <script src="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/novo/plugins/calender/fullcalendar.min.js'); ?>"></script>
  <script type="text/javascript">
  $(function() {
    $('.btn_portal').click(function() {

      var tipo = $(this).attr("data-tipo");
      $("#txtTipo").val(tipo);
      $('#acessoportal').modal('toggle');
    });

  })
  </script>
  <script>
  $('#overlay, #close').on('click', function(event) {
    $("#adonsite, #overlay").hide();
  });

  $('.abrir_galeria').on('click', function(event) {
    var idgaleria = $(this).attr('data-idgaleria');
    var url = '<?php echo base_url("Galeria/consulta_img_json"); ?>/' + idgaleria;

    console.log(url);
    $('#carregar_frame').load(url, function() {

    });

    $("#adonsite, #overlay").show();
  });
  </script>



</body>

</html>