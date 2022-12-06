<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>FJAU - Menu do site</title>

	<!-- COREUI CSS -->
	<link href="<?php echo base_url(); ?>assets/coreui/dist/css/coreui.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/coreui/dist/css/style.css" rel="stylesheet">

	<!-- font awesome -->
	<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<style>

		.c-main{
			padding-top:0px;
		}

		.dropdown-item .dropicon{
			position:absolute;
			right:20px;
		}

		#boxincluir, #boxeditar{
			position:fixed;
			height:100%;
			border:1px solid;
			width:600px;
			right: -600px;
			padding:30px 40px !important;
			top:60px;
		}

		#black{
			position:fixed;
			height:100%;
			width:100%;
			background-color: rgba(0,0,0, 0.6);
			display:none;
		}

	</style>

</head>

<body class="c-app">

	<?php require_once(dirname(__FILE__).'/MenuViewNovo.php'); ?>
	
    <div class="c-wrapper c-fixed-components">
	  
		<?php require_once(dirname(__FILE__).'/HeaderViewNovo.php'); ?>

		<div class="c-subheader px-3">
			
			<ol class="breadcrumb border-0 m-0">
				<li class="breadcrumb-item">Home</li>
				<li class="breadcrumb-item">Conteúdo do site</li>
				<li class="breadcrumb-item active">Menu do site</li>
			</ol>

		</div>

    	<div class="c-body">

			<main class="c-main">

				<div class="card">

					<div class="card-header">
	
						<button type="button" class="btn btn-success btn-square btnMenuAdd" data-idmenupai="0"><i class="fa fa-plus"></i> Novo item</button>
						
					</div>

					<div class="card-body" id="conteudo">

						<?php 
									
							if(isset($_GET['ret'])){
								if($_GET['ret'] == "S"){
									echo "<div class='alert alert-success'><i class='fa fa-check'></i> Salvo com sucesso</div>";
								}
								else{
									echo "<div class='alert alert-danger'><i class='fa fa-times'></i> Ocorreu um erro ao tentar salvar o registro, por favor tente novamente. Se o problema persistir, entre em contato com o desenvolvedor.</div>";
								}
							}


							$menuraiz = array();
							$menusub = array();

							foreach($itensmenu as $val){
								if($val->idmenupai == 0){
									$menuraiz[] = array("idmenu" => $val->idmenu,
														"idmenupai" => $val->idmenupai,
														"descricao" => $val->descricao,
														"visivel" => $val->visivel,
														"link" => $val->link,
														"target" => $val->target,
														"contexto" => $val->contexto,
														"posicao" => $val->posicao,
														"dropdown" => array());
								}
							}

							foreach($itensmenu as $val){
								if($val->idmenupai != 0){
									foreach($menuraiz as $i => $m2){
										if($m2['idmenu'] == $val->idmenupai){
											$menuraiz[$i]['dropdown'][] = $val;
										}
									}
								}
							}

						?>

						<nav class="navbar navbar-expand-lg navbar-light bg-light">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>

							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav mr-auto">

									<?php foreach($menuraiz as $val){ ?>

									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $val['descricao']; ?></a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item btnMenuEdit" data-id="<?php echo $val['idmenu']; ?>" href="#">Editar <i class="dropicon fa fa-pencil text-primary"></i></a>
											<a class="dropdown-item btnMenuDel" data-id="<?php echo $val['idmenu']; ?>" href="#">Remover <i class="dropicon fa fa-times text-danger"></i></a>
											<div class="dropdown-divider"></div>
											<?php foreach($val['dropdown'] as $drop){ ?>
												<a class="dropdown-item btnMenuEdit" data-id="<?php echo $drop->idmenu; ?>" href="#">>> <?php echo $drop->descricao; ?></a>
											<?php } ?>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item btnMenuAdd" data-idmenupai="<?php echo $val['idmenu']; ?>" href="#">Adicionar item <i class="dropicon fa fa-plus text-success"></i></a>
										</div>
									</li>

									<?php } ?>

								</ul>
							</div>
						</nav>

					</div>

				</div>

			</main>

			<div id="black"></div>
		
			<div class="bg-light text-dark shadow-lg p-3 mb-5 bg-white rounded" id="boxincluir">

				<h4 class="text-primary"><i class="fa fa-plus"></i> INCLUIR ITEM NO MENU</h4>

				<br/>

				<form id="formNovo" method="post" action="<?php echo base_url("Menusite/inserir"); ?>">

					<input type="text" id="txtIdMenuPai" name="txtIdMenuPai" value="0" />

					<div class="row">

						<div class="col-md-12">

							<label for="txtDescricao">Descrição: *</label>
							<input type="text" class="form-control" id="txtDescricao" name="txtDescricao" required />

						</div>

					</div>

					<div class="row">

						<div class="col-md-8">

							<label for="txtUrl">Url: *</label>
							<input type="text" class="form-control" id="txtUrl" name="txtUrl" required />

						</div>

						<div class="col-md-4">

							<label for="txtTarget">Target: *</label>
							<select class="form-control" id="txtTarget" name="txtTarget" required>
								<option value="_blank" selected>Nova pagina</option>
								<option value="_self">Mesma pagina</option>
							</select>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="txtPosicao">Posição: *</label>
							<input type="number" class="form-control" id="txtPosicao" name="txtPosicao" value="1" required />

						</div>

						<div class="col-md-4">

							<label for="txtVisivel">Visivel:</label>
							<select class="form-control" id="txtVisivel" name="txtVisivel" required>
								<option value="S" selected>Sim</option>
								<option value="N">Não</option>
							</select>

						</div>

						<div class="col-md-5">

							<label for="txtContexto">Contexto: *</label>
							<select class="form-control" id="txtContexto" name="txtContexto" required />
								<option value="2">Colégio</option>
								<option value="3">Integradas</option>
								<option value="1">Ambos</option>
							</select>

						</div>

					</div>

					<div class="row">

						<div class="col-md-12">

							<label for="txtDinamica">Pagina Dinamica: *</label>
							<select class="form-control" id="txtDinamica" name="txtDinamica" required />
								<option value="0">Não aplicar</option>
								<?php foreach($pagina as $p){
									if($p->id_filial == 2){
										$filial = 'colégio';

									} elseif($p->id_filial == 3){
										$filial = 'integradas';
									} else {
										$filial = 'Ambas';
									};
									echo "<option value='".$p->idpaginadinamica."'>".$p->id_pagina." - ".$p->titulo." (".$filial.")</option>"; 
								} ?>
							</select>

						</div>

					</div>


					<br/><br/>

					<button type="submit" class="btn btn-success btn-square"><i class="fa fa-check"></i> Salvar</button>
					<button type="button" id="btnCancelAdd" class="btn btn-danger btn-square"><i class="fa fa-times"></i> Cancelar</button>

				</form>

			</div>
			<!-- box incluir -->

			<div class="bg-light text-dark shadow-lg p-3 mb-5 bg-white rounded" id="boxeditar">

				<h4 class="text-primary"><i class="fa fa-pencil"></i> EDITAR ITEM DO MENU</h4>

				<br/>

				<form id="formEditar" method="post" action="<?php echo base_url("Menusite/atualizar"); ?>">

					<div>
					</div>

					<br/><br/>

					<button type="submit" class="btn btn-success btn-square"><i class="fa fa-check"></i> Salvar alterações</button>
					<button type="button" id="btnCancelEdit" class="btn btn-secondary btn-square"><i class="fa fa-times"></i> Cancelar</button>

					<button type="button" class="btn btn-danger btn-square btnMenuDel pull-right" data-id="0"><i class="fa fa-times"></i> Excluir</button>

				</form>

			</div>
			<!-- box editar -->
	  
		</div>
		<!-- c-body -->

	</div>
	<!-- c-wrapper -->

	<div class="modal fade" id="modal_del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
		<div class="modal-dialog modal-danger" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><i class="fa fa-times"></i> Excluir Item</h4>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				</div>
				<form id="formDel" method="post" action="<?php echo base_url("Menusite/excluir"); ?>">
					<div class="modal-body">

						<input type="hidden" id="txtIdDel" name="txtIdDel" value="" />
						<strong style="color:red;">Tem certeza que deseja excluir o registro selecionado?</strong>

					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger">Sim, Excluir</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- modal excluir -->

	
	<!-- CoreUI and necessary plugins -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/coreui/dist/js/coreui.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/funcaomenu.js"></script>

	<!-- Anime JS -->
	<script src="<?php echo base_url(); ?>assets/animejs/anime.min.js"></script>

	<script>

		$(function(){

			$('.btnMenuAdd').click(function(){

				var idmenupai = $(this).attr("data-idmenupai");
				$('#txtIdMenuPai').val(idmenupai);

				$('#black').fadeToggle('fast');

				anime({
					targets: '#boxincluir',
					translateX: ['0px', '-600px'],
					opacity: [0,1],
					easing: 'easeInOutExpo',
					duration: 500
				});
				
				$('#formNovo #txtDescricao').focus();

			});

			$('.btnMenuEdit').click(function(){

				var idmenu = $(this).attr("data-id");
				$('#boxeditar .btnMenuDel').attr("data-id", idmenu);

				$('#black').fadeToggle('fast');

				$('#formEditar div').load("<?php echo base_url("Menusite/frame_editar"); ?>/" + idmenu, function(){

					anime({
						targets: '#boxeditar',
						translateX: ['0px', '-600px'],
						opacity: [0,1],
						easing: 'easeInOutExpo',
						delay: 500
					});

					$('#formEditar #txtDescricao').select();

				});

				

			});

			$('#btnCancelAdd').click(function(){

				anime({
					targets: '#boxincluir',
					translateX: ['-600px', '0px'],
					opacity: [1,0],
					easing: 'easeInOutExpo'
				});
				$('#black').fadeToggle('fast');

			});

			$('#btnCancelEdit').click(function(){

				anime({
					targets: '#boxeditar',
					translateX: ['-600px', '0px'],
					opacity: [1,0],
					easing: 'easeInOutExpo'
				});
				$('#black').fadeToggle('fast');

			});

			$(document).on('click','.btnMenuDel',function(){
				$('#txtIdDel').val($(this).attr('data-id'));
				$('#modal_del').modal('show');
			});

		});

	</script>

</body>
</html>