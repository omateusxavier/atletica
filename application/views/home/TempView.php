<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!-- Global Site Tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110006118-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments)};
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
		<link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/flexslider/flexslider.css'); ?>" type="text/css" media="screen"
		/>
		<link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/calender/fullcalendar.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/animate.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/pop-up/magnific-popup.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/novo/plugins/rs-plugin/css/settings.css'); ?>" media="screen">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/owlcarousel/owl.carousel.min.css'); ?>" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/owlcarousel/owl.theme.default.min.css'); ?>" media="screen">
		<link href="<?php echo base_url('assets/google/css361f.css?family=Open+Sans:400,600,600italic,400italic,700'); ?>" rel='stylesheet'
		type='text/css'>
		<link href="<?php echo base_url('assets/google/css83d9.css?family=Roboto+Slab:400,700'); ?>" rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url('assets/novo/css/style.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/novo/css/default.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/novo/css/swiper.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/novo/options/optionswitch.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.css'); ?>">

	<script>
		
		$(function(){
			$('[data-toggle="tooltip"]').tooltip();

            $('#btn_acessorapido').trigger('click');
		});
	</script>
</head>



<body>

<header>

<!-- The header content -->
<div class="container h-100">
  <div class="d-flex h-100 text-center align-items-center">
    <div class="w-100 text-white">
      <h1 class="display-3"><img style="padding-left: 20px; padding-right: 20px" alt="A melhor e maior Instituição de Ensino de Jaú e Região" src="<?php echo base_url('imagens/logo-instituicao.png'); ?>"></h1><br>
      <p class="lead mb-0 text-primary">Fundação Educacional Dr Raul Bauab</p><br>
      <p class="lead mb-0 text-primary">em manutenção...<br><br>
    Para acesso aos portais utilizem o link alternativo:<br><br> http://portal.fundacaojau.edu.br:8077/sif2/aluno<br><br>http://portal.fundacaojau.edu.br:8077/sif2/professor</p><br>
      
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
	

	<script src="<?php echo base_url('assets/js/canvas.js'); ?>"></script>
	<script>
		jQuery(function ($) {
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
