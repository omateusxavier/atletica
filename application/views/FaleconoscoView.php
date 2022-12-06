
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '430222264442524'); 
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" 
src="https://www.facebook.com/tr?id=430222264442524&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
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
  <title>Fundação Educacional Dr Raul Bauab - Fale Conosco</title>
  <link href="<?php echo base_url('assets/novo/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link rel="icon" type="image/png" href="<?php echo base_url('imagens/favicon.ico'); ?>">
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
  <script src='https://www.google.com/recaptcha/api.js'></script>
  
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="body-wrapper">
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  </script>

    <div class="main_wrapper">

        <?php include('MenuView.php'); ?>

            <div class="post_section">
                <div class="container">
                    <?php if(isset($_GET['sucesso'])){ ?>
                    <div class="row">
                        <center>
                            <div class="alert alert-success">
                                <h5>Sua mensagem foi enviada com sucesso!</h5>
                            </div>
                        </center>
                    </div>
                    <?php } elseif(isset($_GET['erro'])){ ?>
                    <div class="row">
                        <center>
                            <div class="alert alert-danger">
                                <h5>Ops :( - ocorreu um erro e sua mensagem não pode ser enviada. Verifique os campos do formulário e tente novamente.</h5>
                            </div>
                        </center>
                    </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-xs-12 col-sm-8 post_left">
                            <div class="post_left_section post_left_border">

                                <div class="related_post_sec single_post">
                                    <!-- <h3>Fale Conosco</h3> -->
                                    <img src="<?php echo base_url('imagens/faleconosco.jpg'); ?>" class="img-responsive"><br>
                                </div><!--end single_post-->
                                
                            </div><!--end post left section-->
                            <div class="row">
                                <div class="col-md-12">
                                <?php foreach($filial as $fil){
                                                    $filial_ = $fil;
                                                } ?>
                                <p>Utitilize nosso formulário e envie suas dúvidas, sugestões e reclamações, diretamente aos departamentos!</p><br><br>
                                    <form class="form-horizontal" role="form" action="<?php echo base_url('Home/Enviar_email_fale_conosco/'.$fil); ?>" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Nome:</label>
                                                <input class="form-control" name="txtNome" id="txtNome" type="text" placeholder="Digite o seu Nome" requerid>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>E-mail:</label>
                                                <input class="form-control" name="txtEmail" id="txtEmail" type="email" placeholder="Digite o seu Email" requerid>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Celular:</label>
                                                <input class="form-control" name="txtCelular" id="txtCelular" type="text" placeholder="Digite um numero de celular valido" requerid>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Assunto:</label>
                                                <input class="form-control" name="txtAssunto" id="txtAssunto" type="text" placeholder="Digite o Assunto" requerid>
                                                
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Departamento:</label>
                                                <select class="form-control" name="txtDepartamento" id="txtDepartamento" requerid>
                                                    <option value="" disabled>[...Selecione um departamento]</option>
                                                    <optgroup label="Administrativo">
                                                        <option value="tesouraria@fundacaojau.edu.br">Departamento Financeiro</option>
                                                        <option value="matheus@fundacaojau.edu.br">Departamento Pessoal / RH</option>
                                                        <option value="tic@fundacaojau.edu.br">Departamento de T.I</option>
                                                        <option value="priscila@fundacaojau.edu.br">Serviço Social</option>
                                                    </optgroup>
                                                    
                                                    
                                                    <optgroup label="Faculdades Integradas">
                                                        <option value="priscila@fundacaojau.edu.br">Secretaria da Faculdade</option>
                                                        <option value="priscila@fundacaojau.edu.br">Biomedicina / Farmácia / Letras / Psicologia / Pedagogia </option>
                                                        <option value="direito.jau@fundacaojau.edu.br">Direito / Publicidade e Propaganda / Jornalismo</option>
                                                        <option value="administracao.jau@fundacaojau.edu.br">Administração / Ciências Contábeis / Educação Física / Enfermagem</option>
                                                        <option value="sandra@fundacaojau.edu.br">Cursos de Pos-Graduação</option>
                                                    </optgroup>
                                                    <optgroup label="Colégio da Fundação">
                                                        <option value="anglojau@fundacaojau.edu.br">Secretária do Colégio</option>
                                                        <option value="cei@fundacaojau.edu.br">Centro de Educação Infantil</option>
                                                        <option value="fundamental1@fundacaojau.edu.br">Ensino Fundamental I</option>
                                                        <option value="fundamentalii@fundacaojau.edu.br">Ensino Fundamental II</option>
                                                        <option value="medio@fundacaojau.edu.br">Ensino Médio e Cursinho</option>
                                                    </optgroup>
                                                    <optgroup label="Ouvidoria">
                                                        <option value="ouvidoria@fundacaojau.edu.br">Ouvidoria</option>
                                                    </optgroup>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Mensagem:</label>
                                                <textarea rows="5" class="form-control" name="txtMensagem" id="txtMensagem" type="text" placeholder="Mensagem" requerid></textarea>
                                            </div>
                                        </div>
                                        <br>
                                            <div class="g-recaptcha" data-sitekey="6Le9ShsUAAAAAJNATvrxCGDx5wnXziGgPKM34zXs"></div><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button name="formcontato" class="btn btn-primary btn-lg" type="submit">Enviar</button>
                                            </div>
                                        </div>
                                    </form>
                                
                                </div>
                            </div>
                        </div><!--end post_left-->

                        <div class="col-xs-12 col-sm-4 post_right">
                            <div class="related_post_sec">

                                <div class="list_block">
                                    <div class="newsletter">
                                        <h3>Newsletter</h3>
                                        <form action="http://portal.fundacaojau.edu.br:8081/sif/WbsServices/newsletter" method="post">
                                            <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                            </div>
                                            <button type="submit" class="btn btn-default btn-block commonBtn">Inscrever-se</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
<script src="<?php echo base_url('assets/novo/js/custom.js'); ?>"></script>
<script src="<?php echo base_url('assets/novo/js/swiper.min.js'); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $(function(){   
        $('.btn_portal').click(function(){
            
            var tipo = $(this).attr("data-tipo");
            $("#txtTipo").val(tipo);
            $('#acessoportal').modal('toggle');
        });
        $('#txtCelular').mask('(99) 99999-9999');
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
</body>

</html>