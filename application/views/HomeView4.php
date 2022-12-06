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

	<style>

		header {
		position: relative;
		background-color: black;
		height: 75vh;
		min-height: 25rem;
		width: 100%;
		height: 100%;
		overflow: hidden;
		
		}

		header video {
		position: absolute;
		top: 50%;
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
		opacity: 0.5;
		z-index: 1;
		opacity: 0.6;
		background: -moz-radial-gradient(center, ellipse cover, rgba(51, 122, 183, 0) 0%, rgba(51, 122, 183, 1) 76%, rgba(51, 122, 183, 1) 100%); 
		background: -webkit-radial-gradient(center, ellipse cover, rgba(51, 122, 183, 0) 0%, rgba(51, 122, 183, 1) 76%, rgba(51, 122, 183, 1) 100%);
		background: radial-gradient(ellipse at center, rgba(51, 122, 183, 0) 0%, rgba(51, 122, 183, 1) 76%, rgba(51, 122, 183, 1) 100%); 
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00820b21', endColorstr='#820b21', GradientType=1);
		}

		@media (pointer: coarse) and (hover: none) {
		header {
			background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll;
		}
		header video {
			display: none;
		}
		}															
	</style>
</head>


<body>

	<header>
	<div class="camada"></div>
	<div class="overlay"></div>
	<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
		<source src="<?php echo base_url('assets/videos/003.mp4'); ?>" type="video/mp4">
	</video>
	<div class="container h-100">
		<div class="d-flex h-100 text-center align-items-center">
		<div class="w-100 text-white">
			<h1 class="display-3">Video Header</h1>
			<p class="lead mb-0">With HTML5 Video and Bootstrap 4</p>
		</div>
		</div>
	</div>
	</header>
</body>

</html>
