<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?php echo $this->configsite->TITULOSITE; ?> - Login</title>

  <!-- Icons -->
  <link href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
    rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="<?php echo base_url(); ?>/coreui/css/style.css" rel="stylesheet">

  <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>

  <script>
  $(function() {

    $('#txtLogin').select();

  });
  </script>


</head>

<?php

	$login = "";
	
	if(isset($_GET['login'])){
		$login = $_GET['login'];
	}

  // var_dump($_SESSION['login']);

?>

<body class="app flex-row align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <?php 
			
			if(isset($_GET['ret'])){ 
			
				if($_GET['ret'] == "N"){
			
					echo "<div class='alert alert-danger'>
							
								<i class='fa fa-times'></i> Usuário ou senha incorretos!
							
						  </div>";
			
				}
				else if($_GET['ret'] == "1"){
					
					echo "<div class='alert alert-danger'>
							
								<i class='fa fa-times'></i> Usuário desativado, por favor entre em contato com o administrador!
							
						  </div>";
					
				}
				
			}
			
		?>
        <div class="card-group">
          <div class="card p-4">
            <div class="card-body">
              <form id="formLogin" method="post" action="<?php echo base_url("Admin/logar"); ?>">
                <h1>Acesso</h1>
                <p class="text-muted">Preencha os dados abaixo para entrar</p>
                <div class="input-group mb-3">
                  <span class="input-group-addon"><i class="icon-user"></i></span>
                  <input type="text" class="form-control" id="txtLogin" name="txtLogin" placeholder="Login ou E-mail"
                    value="<?php echo $login; ?>" required />
                </div>
                <div class="input-group mb-4">
                  <span class="input-group-addon"><i class="icon-lock"></i></span>
                  <input type="password" class="form-control" id="txtSenha" name="txtSenha" placeholder="Senha"
                    required />
                </div>
                <div class="row">
                  <div class="col-6">
                    <button type="submit" class="btn btn-success px-4">Entrar</button>
                  </div>
                </div>
            </div>
            </form>
          </div>
          <div class="card text-white bg-success py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <img src="<?php echo base_url("imagens/logo-jacare.png"); ?>" class="img-fluid"
                style="margin-top:0px; max-width:200px;" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>/assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap_4.min.js"></script>
</body>

</html>