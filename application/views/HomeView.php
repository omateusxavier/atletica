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

            $('#btn_acessorapido').trigger('click');
		});
	</script>
</head>
<style>
  #AcessoRapido{
      z-index:9999; 
      position:fixed; 
      bottom:30px; 
      right:20px; 
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
					<a href="<?php echo base_url('Colegio'); ?>" class="btn btn-primary btn-lg hidden-xs" style="width: 150px"><i class="fa fa-home"></i> Colégio</a>
					<img style="padding-left: 20px; padding-right: 20px" alt="A melhor e maior Instituição de Ensino de Jaú e Região" src="<?php echo base_url('imagens/logo-instituicao.png'); ?>">
					<a href="<?php echo base_url('integradas'); ?>" class="btn btn-primary btn-lg hidden-xs" style="width: 150px"><i class="fa fa-graduation-cap"></i> Integradas</a><br>
                    <!-- <br><a target="_blank" href="http://portal.fundacaojau.edu.br:8178/web/app/Edu/PortalProcessoSeletivo/?c=1&f=1&ps=204#/es/informacoes" class="btn btn-success">Inscrições Vestibular Agendado</a> -->
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
			<div class="row" style="padding-top:50px">
				<center>
                
				</center>
			</div>
			
		</div>
		

	</section>
	
	<div class="dropup" id="AcessoRapido">
		<button id="btn_acessorapido" class="btn btn-danger dropdown-toggle btn-circle btn-xl" type="button" data-toggle="dropdown" data-placement="bottom" title="Acesso Rápido"><i class="fa fa-hand-pointer-o fa-3x fa-fw" style="font-size:24px"></i><span class="caret"></span></button>
		</button>
		<ul class="dropdown-menu dropdown-menu-right">
			<li><a href="http://portal.fundacaojau.edu.br:8077/sif2/aluno"><i class="fa fa-user-circle" aria-haspopup="true"></i> Portal do Aluno</a></li>
			<li><a href="http://portal.fundacaojau.edu.br:8077/sif2/professor"><i class="fa fa-users"></i> Portal do Professor</a></li>
			<li><a href="http://portal.fundacaojau.edu.br:8077/sif2/PortalColaborador"><i class="fa fa-user-circle"></i> Portal do Colaborador</a></li>
			<li><a href="https://webmail-seguro.com.br/fundacaojau.edu.br/v2/"><i class="fa fa-envelope"></i> Email Colaborador</a></li>
			<!--<li><a href="#"><i class="fa fa-money"></i> 2ª Via de Boleto</a></li>-->
            <li><a href="<?php echo base_url('colegio/pagina/trabalhe-conosco-141'); ?>"><i class="fa fa-briefcase"></i> Trabalhe Conosco</a></li>
            <li><a href="<?php echo base_url('colegio/Ouvidoria/2'); ?>"><i class="fa fa-weixin"></i> Ouvidoria</a></li>
            <!--<li class="btn btn-warning"><a href="<?php //echo base_url('integradas/vestibular'); ?>" target='_blank'><i class="fa fa-spinner fa-pulse fa-fw"></i> <b>Inscrição Vestibular</b></a></li> -->
        </ul>
	</div>

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
                              Edital 001/2019 - Professor de Xadrez - <a target="_blank" href="http://portal.fundacaojau.edu.br:8077/trabalheconosco/Classificacao_Final_Xadrez.pdf">Classificação Final</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              Edital 002/2019 - Professor Ciências Biológica - <a target="_blank" href="http://portal.fundacaojau.edu.br:8077/trabalheconosco/Classificacao_Final_Ciencias.pdf">Classificação Final</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              Edital 002/2019 - LÍNGUA ESTRANGEIRA - INGLÊS - <a target="_blank" href="http://portal.fundacaojau.edu.br:8077/trabalheconosco/ENTREVISTA_002_ingles.pdf">Entrevista e
Aula Expositiva.</a>
                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="col-md-12">
                              Edital 003/2019 - MONITOR - <a target="_blank" href="http://portal.fundacaojau.edu.br:8077/trabalheconosco/convocacaoedital_003-2019.pdf">Convocação para Prova Situacional</a>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                              Edital 004/2019 - Professor de curso pré vestibular / cursinho - <a target="_blank" href="http://portal.fundacaojau.edu.br:8077/trabalheconosco/Classificacao_Final_Pre_Vestibular.pdf">Classificação Final</a>
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

</html>
