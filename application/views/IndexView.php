<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
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
	<title>Conpoju</title>
	<!--<link rel="icon" type="image/png" href="<?php //echo base_url('imagens/favicon.ico'); ?>">-->
	<link href="<?php echo base_url('assets/novo/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/selectbox/select_option1.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/font-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/flexslider/flexslider.css'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/calender/fullcalendar.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/animate.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/novo/plugins/pop-up/magnific-popup.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/novo/plugins/rs-plugin/css/settings.css'); ?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/novo/plugins/owl-carousel/owl.carousel.css'); ?>" media="screen">
	<link href="<?php echo base_url('assets/google/css361f.css?family=Open+Sans:400,600,600italic,400italic,700'); ?>" rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url('assets/google/css83d9.css?family=Roboto+Slab:400,700'); ?>" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url('assets/novo/css/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/novo/css/default.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/novo/css/swiper.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.css'); ?>">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<style>
		
		#close {float: right;}

		.white-content {
			position: fixed;
			top: 60px;
			left: 5%; 
			transform: translate(0%, 0%);
			padding: 16px;
			background-color: #222;
			z-index:999;
			overflow: auto;
			width: 90%;
			height: 90%;
		}
		#overlay {
			background-color: rgba(0,0,0,.5);
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

		@media(max-width:767px) {
			
			.legenda_carrossel{ 
			  display: block;
			}
		}

	</style>

</head>

<body class="body-wrapper">
  
  <div class="main_wrapper">

    <?php include('MenuView.php'); ?>

    <div class="banner carousel slide" id="recommended-item-carousel" data-ride="carousel">
      <div class="slides carousel-inner">
        <?php
        $idfilial = 1;
        $contador_carrossel = 1;
        
        foreach($carrossel as $c){
          $numero_carrossel = $contador_carrossel;

          if($numero_carrossel == 1){
            $active = "active";
          } else {
            $active = '';
          }
          if($c->target != 'EXTERNO'){
            $link = base_url(); 
            $target = $c->target;
          } else{
            $link = '';
            $target = '_blank';
          }?>
        <div class="item <?php echo $active; ?>"> <?php if($c->box != 'S' & ($c->link != null)){ ?>
          <a href="<?php echo $link.$c->link;?>" target="<?php echo $target; ?>">
            <img src="<?php echo base_url('imagens/carrossel/'.$c->img); ?>" alt="<?php echo $c->descricao; ?>" title="<?php echo $c->titulo; ?>" />
          </a>

          <?php } else { ?>

            <img src="<?php echo base_url('imagens/carrossel/'.$c->img); ?>" alt="<?php echo $c->descricao; ?>" title="<?php echo $c->titulo; ?>" />

         <?php } if($c->box == 'S'){ ?>
          <div class="banner_caption">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="caption_inner animated fadeInUp">
                    <h1><?php echo $c->titulo; ?></h1>
                    <p><?php echo $c->descricao; ?></p>
                    <?php if($c->btn != null) { echo "<a href=".$link.$c->link." target=".$target.">".$c->btn."</a>"; }?>
                  </div><!--end caption_inner-->
                </div>
              </div><!--end row-->
            </div><!--end container-->
          </div><!--end banner_caption-->
          <div class="alert visible-xs">
            <p><b><?php echo $c->titulo; ?></b> - <?php echo $c->descricao; ?> <?php if($c->btn != null) { echo "<a href=".$link.$c->link." target=".$target.">".$c->btn."</a>"; }?></p>
          </div>
          <?php } ?>
        </div>
      <?php
      $contador_carrossel = $numero_carrossel + 1;
       } ?>
      </div>
      <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
        <img src="<?php echo base_url('assets/novo/img/home/slider/prev.png'); ?>">
        </a>
      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
        <img src="<?php echo base_url('assets/novo/img/home/slider/next.png'); ?>">
      </a>
    </div><!--end banner-->

	<div class="aboutArea">
		<div class="container">
			<div class="row ">
				<div class="col-xs-12">
					<div class="aboutTitle">
					</div><!-- aboutTitle -->
				</div><!-- col-sm-3 col-xs-12 -->
			</div><!-- row clearfix -->

			<div class="about_inner">
				<div class="row">
					
					<div class="col-md-12 text-center" style="height:70px;">
					
						<span style="color:white; font-size:16px;"><i class="fa fa-clock-o"></i> FALTAM PARA O EVENTO:</span>
						<h1 class="lead" id="clock" style="color:white; font-family:arial; font-size:40px;"></h1>
						
					</div>
					
					<!--<div class="col-xs-6 col-sm-3">
						<div class="aboutImage">
							<a href="https://www.youtube.com/user/FUNDACAOJAU">
								<img src="<?php //echo base_url('assets/novo/img/home/learn/learn_1.jpg'); ?>" alt="" class="img-responsive" />
								<div class="overlay">
									<p>Confira nosso canal no youtube.</p>
								</div>
								<span class="captionLink"> <i class="fa fa-youtube fa-1x"></i> Youtube<span></span></span>
							</a>
						</div>
					</div>-->
					
				</div><!-- row -->
			</div><!-- about_inner -->

		</div><!-- container -->
	
	</div><!-- aboutArea -->

    <div class="mainContent clearfix">
      <div class="container">
        <div class="row clearfix">

          <div class="col-sm-8 col-xs-12">
            <div class="videoNine clearfix">

              <div class="related_post_sec single_post">
                <h3>ÚLTIMAS NOTÍCIAS</h3>
                <ul>
                
					<?php 
					
						if(count($noticias) > 0){
					
							foreach($noticias as $not){

								$mes = date('m', strtotime($not->data));
								$dia = date('d', strtotime($not->data));
								$ano = date('Y', strtotime($not->data));

								switch($mes){
									case "01":    $mes = 'Janeiro';     break;
									case "02":    $mes = 'Fevereiro';   break;
									case "03":    $mes = 'Março';       break;
									case "04":    $mes = 'Abril';       break;
									case "05":    $mes = 'Maio';        break;
									case "06":    $mes = 'Junho';       break;
									case "07":    $mes = 'Julho';       break;
									case "08":    $mes = 'Agosto';      break;
									case "09":    $mes = 'Setembro';    break;
									case "10":    $mes = 'Outubro';     break;
									case "11":    $mes = 'Novembro';    break;
									case "12":    $mes = 'Dezembro';    break; 
								}  

								if($not->capa != null){
									$nomeimg = explode(".", $not->capa);
									$extensao = $nomeimg[1];
									$imgnova = base_url()."imagens/noticias/".$not->id."/".$nomeimg[0]."_thumb.".$extensao;
								}
								else {
									$imgnova = base_url('imagens/noticias/capa.jpg');
								}
                    
					?>
                    
					<li>
						<span class="rel_thumb">
							<a href="<?php echo base_url('Home/Noticias/'.$not->filial.'/'.$not->url_amigavel); ?>"><img src="<?php echo $imgnova; ?>" alt="<?php echo $not->titulo; ?>" title="<?php echo $not->url_amigavel; ?>" class="img-responsive img-thumbnail" ></a>
						</span>
						<div class="rel_right">
							<h4><a href="<?php echo base_url('Home/Noticias/'.$not->filial.'/'.$not->url_amigavel); ?>"><?php echo $not->titulo; ?></a></h4>
							<div class="meta">
								<span class="author">Postado por: <a href="#"><?php if($not->nome != null){ echo $not->nome; } else { echo "Colaborador"; } ?></a></span>
								<span class="date">em: <a href="#"><?php echo $dia. " ".$mes.", ".$ano; ?></a></span>
							</div>
							<p><?php echo $not->previa; ?></p><br>
							<a href="<?php echo base_url('Home/Noticias/'.$not->filial.'/'.$not->url_amigavel); ?>" class="btn btn-default">Ver Notícia</a>
						</div>
					</li>
                  
				  <?php 
					
							}
							
				?>
				
					<br><a href="<?php echo base_url('Home/todasnoticias/1'); ?>" class="btn btn-default btn-block commonBtn">VER TODAS</a>
					
				<?php

						}
						else{
							echo "<li>Nenhuma notícia para exibir</li>";	
						}
						
				?>
                </ul>
              </div>

          </div>
          
          </div><!-- col-sm-8 col-xs-12 events-3col.html -->

          <div class="col-sm-4 col-xs-12">
            
			<!-- AGENDA INICIO -->
            <div class="list_block related_post_sec">
              <div class="upcoming_events">
                <h3>CALENDÁRIO</h3>
                <ul>
					<?php 
					
						if(count($eventos) > 0){
							
							foreach($eventos as $e){
							
								if($e->link != null){
									if($e->target != 'EXTERNO'){
										$link = base_url().$e->link;
										$target = $e->target;
									}
									else{
										$link = $e->link;
										$target = "_blank";
									}
								} 
								else{
									$link = '';
								}
							
								$mes_evento = date('m', strtotime($e->datainicio));
								$dia_evento = date('d', strtotime($e->datainicio));

								switch($mes_evento){
									case "01":    $mes_evento = 'Janeiro';     break;
									case "02":    $mes_evento = 'Fevereiro';   break;
									case "03":    $mes_evento = 'Março';       break;
									case "04":    $mes_evento = 'Abril';       break;
									case "05":    $mes_evento = 'Maio';        break;
									case "06":    $mes_evento = 'Junho';       break;
									case "07":    $mes_evento = 'Julho';       break;
									case "08":    $mes_evento = 'Agosto';      break;
									case "09":    $mes_evento = 'Setembro';    break;
									case "10":    $mes_evento = 'Outubro';     break;
									case "11":    $mes_evento = 'Novembro';    break;
									case "12":    $mes_evento = 'Dezembro';    break; 
								}  
								
					?>
					
					<li class="related_post_sec single_post">
						<span class="date-wrapper">
						  <span class="date"><span><?php echo $dia_evento; ?></span><?php echo $mes_evento; ?></span>
						</span>
						<div class="rel_right">
						  <h4><a href="<?php echo $link; ?>" target="<?php echo $target; ?>"><?php echo $e->evento; ?></a></h4>
						  <div class="meta">
							<span class="place"><i class="fa fa-map-marker"></i><?php echo $e->local; ?></span>
							<span class="event-time"><i class="fa fa-clock-o"></i>
							<?php if($e->datafinal != $e->datainicio){
							  echo "de ".date('d/m', strtotime($e->datainicio))." a ". date('d/m', strtotime($e->datafinal)). " ". $e->horarioexibir;
							}
							else { echo $e->horarioexibir; } ?></span>
							 <!--<button type="button" class="btn btn-link btn-xs">Detalhes</button>-->
						  </div>
						</div>
					  </li>
					  
					 
					<?php 
					
						}
					
					} 
					else{		
						echo "<li>Nenhum evento para exibir</li>";	
					}
					
					?>
                  
                </ul>
                <a href="<?php echo base_url('Home/eventos'); ?>" class="btn btn-default btn-block commonBtn">VER TODOS</a>
              </div>
            </div>
			<!-- AGENDA FIM -->
			
			<!-- GALERIA DESTAQUE INICIO -->
			<div class="formArea clearfix">
              <div class="formTitle">
                <h3>Galerias</h3>
                <?php
                if(count($galerias) > 0){
                  foreach($galerias as $g){
                    if($g->nomeimg != null){
                    $img = base_url('imagens/galerias/'.$g->id.'/'.$g->nomeimg);
                    }else {
                      $img = base_url('imagens/galerias/semcapa.jpg');
                    } ?>
                  <a class="abrir_galeria" data-idgaleria="<?php echo $g->id; ?>" href="#"><img src="<?php echo $img; ?>" class="img-responsive"></a>
                  <a href="#" class="btn btn-primary abrir_galeria" data-idgaleria="<?php echo $g->id; ?>" style="margin: 5px"><?php echo $g->total; ?></a> Fotos / <?php echo $g->galeria; ?>
                  
                  <a href="<?php echo base_url('Home/Galerias/'.$g->filial); ?>" class="btn btn-default btn-block commonBtn">VER TODAS</a>
                  <?php } 
                } else {
                  echo "Nenhuma Galeria em destaque";
                 } ?>
              </div>
              
            </div>
			<!-- GALERIA DESTAQUE FIM -->
			
          </div>

        </div>
      </div>
    </div>

    <!--<div class="count clearfix wow fadeIn paralax" data-wow-delay="100ms" style='<?php echo "background-image: url(".base_url()."assets/novo/img/home/paralax/paralax03.jpg);"; ?>'>
      <div class="container">
        <div class="row">
        <br><Br><br><br><br><br>
        
          <div class="col-xs-6 col-sm-3">
            <div class="text-center">
              <div class="icon"><i class="fa fa-group"></i></div>
              <div class="counter">
              <span class="timer">100</span>
              </div>
              <div class="seperator-small"></div>
            <p>Aprovados em Universidades do brasil</p>
            </div>
          </div>
          <div class="col-xs-6 col-sm-3">
            <div class="text-center">
              <div class="icon"><i class="fa fa-book"></i></div>
              <div class="counter">
              <span class="timer">6000</span>
              </div>
              <div class="seperator-small"></div>
              <p>exemplares em duas bibliotecas</p>
            </div>
          </div>
          <div class="col-xs-6 col-sm-3">
            <div class="text-center">
              <div class="icon"><i class="fa fa-male"></i></div>
              <div class="counter">
              <span class="timer">10</span>
              </div>
              <div class="seperator-small"></div>
              <p>Professores nota 10</p>
            </div>
          </div>
          <div class="col-xs-6 col-sm-3">
            <div class="text-center">
              <div class="icon"><i class="fa fa-map-marker"></i></div>
              <div class="counter">
              <span class="timer">10</span>
              </div>
              <div class="seperator-small"></div>
              <p>Estrutura nota 10</p>
            </div>
          </div>
        
        </div>
      </div>
    </div>
	-->

    <div class="testimonial-section clearfix">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="testimonial">
				<h3>DEPOIMENTOS</h3>
			
				<?php 
				
					if(count($depoimentos) > 0){ 
						
						foreach($depoimentos as $dep){ ?>
							
							<div class="carousal_content">
								<p><?php echo $dep->descricao; ?></p>
							</div>
							<div class="carousal_bottom">
								<div class="thumb">
									<i class="fa fa-user fa-3x"></i>
								</div>
								<div class="thumb_title">
									<span class="author_name"><?php echo $dep->nome; ?></span>
									<span class="author_designation"><?php echo $dep->perfil; ?></span>
								</div>
							</div>
			
                <?php 
				
						}
						
					} 
					else{	
						echo "<br/>Nenhum depoimento para exibir";	
					}
			  
				?>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <!--<div class="features">
              <h3>Onde Estamos?</h3>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d932.7647928106513!2d-48.55367726220085!3d-22.286573144185567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b8a7fecae48f53%3A0x5bd775c277f7b867!2sFunda%C3%A7%C3%A3o+Educacional+Dr+Raul+Bauab+-+Jahu!5e1!3m2!1spt-BR!2sbr!4v1536886667076" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>-->
          </div>
        </div>
      </div>
    </div>

    <!-- trocar swipper -->
    <div class="brandSection clearfix">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">

			<h4>PATROCINADORES:</h4>
			
			<br/>
			
			<center>
				<img src="<?php echo base_url(); ?>imagens/patrocinadores.jpg" />
			</center>

            <!--<div class="owl-carousel partnersLogoSlider">
			
                <?php 
                if(count($icones) > 0){

                    foreach($icones as $ico){ 
                      
                    if($ico->icone == null or ($ico->icone == '')){
                        $capa = "<img src='" . base_url('imagens/icones/' . $ico->id . "/" . $ico->img) . "' class='img-fluid' style='max-width:50px;'/>";
                    }else{
                        $capa = "<i class='fa ".$ico->icone." fa-5x'></i>";
                    }
                    ?>

                      <div class="slide">
                        <div class="partnersLogo clearfix">
                        <?php if($ico->target == 'EXTERNO'){
                          $target = '_blank';
                        } elseif($ico->target == 'DINAMICA'){
                          $target = '';

                        }else {
                          $target = $ico->target;
                        }
                        if($ico->arquivo != null){
                          $link_icone = base_url('arquivos/icones/'.$ico->arquivo);
                        } else {
                            if($ico->target == 'EXTERNO'){
                                $link_icone = $ico->link;
                            } else {
                                $link_icone = base_url($ico->link);
                            }
                        } ?>
                          <a target="<?php echo $target; ?>" href="<?php echo $link_icone; ?>"><?php echo $capa; ?></a>
                          <br><br>
                          <center><?php echo $ico->titulo; ?></center>
                        </div>
                      </div>

                <?php
                    }
                } ?>

            </div>-->
			
			
          </div>
        </div>
      </div>
    </div><!-- Brand-section -->

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
	<script src="<?php echo base_url('assets/novo/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/novo/plugins/selectbox/jquery.selectbox-0.1.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/novo/plugins/pop-up/jquery.magnific-popup.js'); ?>"></script>
	<script src="<?php echo base_url('assets/novo/plugins/animation/waypoints.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/novo/plugins/count-up/jquery.counterup.js'); ?>"></script>
	<script src="<?php echo base_url('assets/novo/plugins/animation/wow.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/novo/plugins/animation/moment.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/novo/plugins/calender/fullcalendar.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/novo/plugins/owl-carousel/owl.carousel.js'); ?>"></script>
	<script src="<?php echo base_url('assets/novo/plugins/timer/jquery.syotimer.js'); ?>"></script>
	<script src="<?php echo base_url('assets/novo/plugins/smoothscroll/SmoothScroll.js'); ?>"></script>
	<script src="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/novo/js/custom.js'); ?>"></script>
	<script src="<?php echo base_url('assets/novo/js/swiper.min.js'); ?>"></script>

	<script src="<?php echo base_url(); ?>assets/jquery-countdown/jquery.countdown.min.js"></script>

	<script type="text/javascript">
	
		$(function(){   
			$('.btn_portal').click(function(){

				var tipo = $(this).attr("data-tipo");
				$("#txtTipo").val(tipo);
				$('#acessoportal').modal('toggle');
			});
		})
		
	</script>

	<script>
	
		var swiper = new Swiper('.swiper-container', {
			navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
			},
		});
		
	</script>
	
	<script>
    
		$('#overlay, #close').on('click', function(event){
			$("#adonsite, #overlay").hide();
		});

		$('.abrir_galeria').on('click', function(event){
			
			var idgaleria = $(this).attr('data-idgaleria');
			var url = '<?php echo base_url("Galeria/consulta_img_json"); ?>' + '/'+idgaleria;

			$('#carregar_frame').load(url, function(){
			});

			$("#adonsite, #overlay").show();
		
		});

		function get15dayFromNow(){
			return new Date('2019-09-30 19:00:00');
		}

		var $clock = $('#clock');

		$clock.countdown(get15dayFromNow(), function(event){
			$(this).html(event.strftime('%D DIAS %H:%M:%S'));
		});
	
    </script>
	
</body>
</html>