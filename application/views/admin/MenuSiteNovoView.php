<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>3Clicks Sistemas - Categorias</title>

	<!-- COREUI CSS -->
	<link href="<?php echo base_url(); ?>/assets/coreui/dist/css/coreui.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>/assets/coreui/dist/css/style.css" rel="stylesheet">

	<!-- font awesome -->
	<link href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<style>

		.c-main{
			padding-top:10px;
		}

	</style>

</head>

<body class="c-app">

	<?php require_once(dirname(__FILE__).'/MenuView.php'); ?>
	
    <div class="c-wrapper c-fixed-components">
	  
		<?php require_once(dirname(__FILE__).'/HeaderView.php'); ?>

		<div class="c-subheader px-3">
			
			<ol class="breadcrumb border-0 m-0">
				<li class="breadcrumb-item">Home</li>
				<li class="breadcrumb-item"><a href="<?php echo base_url("Categorias"); ?>">Categorias</a></li>
				<li class="breadcrumb-item active">Novo</li>
			</ol>

		</div>

    	<div class="c-body">

			<main class="c-main">

				<div class="container-fluid">

					<form id="formNovo" method="post" action="<?php echo base_url("Categorias/inserir"); ?>">

						<div class="card">

							<div class="card-header">
			
								<a href="<?php echo base_url("Categorias"); ?>" class="btn btn-light btn-square"><i class="fa fa-chevron-left"></i> Voltar</a>
								<button type="submit" class="btn btn-success btn-square"><i class="fa fa-check"></i> Salvar</button>
								
							</div>

							<div class="card-body">

								<div class="row">

									<div class="col-md-6">

										<label for="txtIdCategoriaPai">Categoria pai:</label>
										<select class="form-control" id="txtIdCategoriaPai" name="txtIdCategoriaPai">
											<option value="0">Não possui</option>
											<?php
												if(count($categorias) > 0){
													foreach($categorias as $val){
														if($val->idcategoriapai == 0){
															echo "<option value='" . $val->idcategoria . "'>" . $val->nome . "</option>";
														}
													}
												}
											?>
										</select>

									</div>

									<div class="col-md-6">

										<label for="txtNome">Nome: *</label>
										<input type="text" class="form-control" id="txtNome" name="txtNome" autocomplete="off" required />

									</div>

								</div>

							</div>

						</div>

					</form>

				</div>
				<!-- container fluid -->

			</main>
		
			<footer class="c-footer">

				<div class="ml-auto"><a href="#">3Clicks Sistemas</a></div>

			</footer>
	  
		</div>
		<!-- c-body -->

	</div>
	<!-- c-wrapper -->
	
	<!-- CoreUI and necessary plugins -->
	<script src="<?php echo base_url(); ?>/assets/coreui/dist/js/coreui.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/funcaomenu.js"></script>

	<script>

		$(function(){

			
		});

	</script>

</body>
</html>