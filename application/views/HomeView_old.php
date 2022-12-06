<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
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
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Fundação Educacional Dr Raul Bauab - Colégio e Faculdade</title>
	<meta name="description" content="Tradição, Ensino diferenciado e Tecnologia, da Educação Infantil ao Ensino Superior.">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/home.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url('assets/novo/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<link href="<?php echo base_url('assets/novo/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  	<link rel="canonical" href="www.fundacaojau.edu.br"> 
	<link rel="shortcut icon" href="<?php echo base_url('imagens/favicon.ico'); ?>" />
    <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Fundação Educacional Dr Raul Bauab" />
    <meta property="og:image" content="http://www.fundacaojau.edu.br/assets/img/img-facebook.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <!--[if IE]><link rel="shortcut icon" href="img/favicon.ico"><![endif]-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script>
		
		$(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</head>
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
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00820b21', endColorstr='#820b21', GradientType=1);
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
  

  

	@media only screen and (max-width: 599px) {
		#tapume {
			position: absolute;
			top: 20%;
			z-index: 999;
			width: 100%;
			text-align: center;
		}
		#tapume img {
			
			display: block;
			margin: 0 auto;
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

	@media only screen and (min-width: 599px) {
		#tapume {
			position: absolute;
			top: 20%;
			z-index: 999;
			width: 100%;
			text-align: center;
		}
		#tapume img {
			
			display: block;
			margin: 0 auto;
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

	@media only screen and (min-width: 997px) {
		#tapume {
			position: absolute;
			z-index: 9999;
			left: 50%;
			top: 60%;
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

	@media only screen and (max-width: 997px) {
		#tapume {
			position: absolute;
			z-index: 9999;
			left: 50%;
			top: 60%;
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

	

</style>

<body>
	<section class="home" id="home">
		<video autoplay="autoplay" poster="<?php echo base_url('imagens/fallback.jpg'); ?>" loop="loop" muted="" width="300" height="150"
		class="videofull" id="my-video">
		</video>

		<canvas class="canvas"></canvas>
		<div class="camada"></div>

		<div id="tapume">
			<div class="row">
				<center>
					<a href="<?php echo base_url('Colegio'); ?>" class="btn btn-primary btn-lg hidden-xs hidden-sm" style="width: 150px"><i class="fa fa-home"></i> Colégio</a>
					<img style="padding-left: 20px; padding-right: 20px" alt="A melhor e maior Instituição de Ensino de Jaú e Região" src="<?php echo base_url('imagens/logo-instituicao.png'); ?>">
					<a href="<?php echo base_url('integradas'); ?>" class="btn btn-primary btn-lg hidden-xs hidden-sm" style="width: 150px"><i class="fa fa-graduation-cap"></i> Integradas</a><br>
				</center>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<center>
						<a href="<?php echo base_url('Colegio'); ?>" class="btn btn-primary btn-lg visible-xs" style="width: 200px"><i class="fa fa-home"></i> Colégio</a>
					</center>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<center>
						<a href="<?php echo base_url('integradas'); ?>" class="btn btn-danger btn-lg visible-xs" style="width: 200px"><i class="fa fa-graduation-cap"></i> Integradas</a><br>
					</center>
			</div>
			<!--
			<div class="row" style="padding-top:50px">
				<center>
					<ul>
					<li><a href="#">Trabalhe Conosco</a></li>
					<li><a href="#">Ações Sociais</a></li>
					<li class="hidden-xs"><a href="#">Fale Conosco</a></li>
					<li class="hidden-xs"><a href="#">Onde Estamos</a></li>
					</ul>
				</center>
			</div>
			<br>
			
			<div class="row"> 
				<div class="col-md-2 col-xs-4 icones-home"><center><a style="color: #fff" href="#" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Visite nosso Facebook"><i class="fa fa-facebook-square fa-3x aria-hidden="true""></i></a></center></div>
				<div class="col-md-2 col-xs-4 icones-home"><center><a style="color: #fff" href="#" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Visite nosso Youtube"><i class="fa fa-youtube-square fa-3x" aria-hidden="true"></i></a></center></div>
				<div class="col-md-2 col-xs-4 icones-home"><center><a style="color: #fff" href="#" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Visite nosso Instagram"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a></center></div>
				<div class="col-md-2 col-xs-4 icones-home"><center><a style="color: #fff" href="#" target="_blank" data-toggle="tooltip" data-placement="bottom" title="E-mail Colaborador"><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></a></center></div>
				<div class="col-md-2 col-xs-4 icones-home"><center><a style="color: #fff" href="#" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Portal do Aluno"><i class="fa fa-pencil-square-o fa-3x" aria-hidden="true"></i></a></center></div>
			</div>
			-->
			
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

</html>
