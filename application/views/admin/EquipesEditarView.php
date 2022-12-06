<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $this->configsite->TITULOSITE; ?> - Editar Equipe</title>

  <!-- Icons -->
  <link href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
    rel="stylesheet">

  <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>

  <script src="<?php echo base_url(); ?>/assets/js/jquery.maskedinput.min.js"></script>

  <!-- Main styles for this application -->
  <link href="<?php echo base_url(); ?>/coreui/css/style.css" rel="stylesheet">

  <!-- CSS próprio -->
  <link href="<?php echo base_url(); ?>/assets/css/estilo.css" rel="stylesheet">

   <!-- DataTables -->
   <link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>/assets/datatables/datatables/css/dataTables.bootstrap4.min.css">
  <script type="text/javascript" language="javascript"
    src="<?php echo base_url(); ?>/assets/datatables/datatables.min.js"></script>
  <script type="text/javascript" language="javascript"
    src="<?php echo base_url(); ?>/assets/datatables/datatables/js/dataTables.bootstrap4.min.js"></script>

</head>

<script>
$(function() {

  $('[data-toggle="tooltip"]').tooltip();

  $('#txtCep').mask('99999-999');

  $('#txtNome').focus();

  $('#btnBuscarCep').click(function() {
    buscar_endereco();
  });

  $('#txtCep').focusout(function() {
    buscar_endereco();
  });

  <?php if(isset($_GET['tab']) == 'filial'){ ?>

  $('#filiais-tab').tab('show');

  <?php } else { ?>

  $('#permissao-tab').tab('show');

  <?php } ?>

  $('.btnExcluir').click(function() {

    var id_usuariofilial = $(this).attr('data-idusuariofilial');

    $('#txtIdUsuarioFilial_del').val(id_usuariofilial);
    $('#modal_excluir_filial').modal('show');

  });

});
</script>

<style>
.panel-heading {
  padding: 8px;
  font-size: 14px;
  max-width: 250px;
}

.panel-heading i {
  font-size: 20px;
}

.panel-body {
  padding: 12px;
  padding-top: 15px;
  border: 1px solid #20a8d8;
}

#txtImagem,
#txtImagemEdit,
#box_carousel,
#txtCapa {
  display: none;
}
</style>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

  <?php 
	
		include "CabecalhoView.php"; 
		
		$equipe = $this->EquipesModel;
		
	?>

  <div class="app-body">

    <?php include "MenuView.php"; ?>

    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Admin"); ?>">Home</a></li>
        <li class="breadcrumb-item">Globais</li>
        <li class="breadcrumb-item"><a href="<?php echo base_url("Atletas"); ?>">Atletas</a></li>
        <li class="breadcrumb-item active"><?php echo $equipe->DESCRICAO; ?></li>
      </ol>

      <form id="formEditar" method="post" action="<?php echo base_url("Equipes/atualizar/" . $equipe->IDEQUIPE); ?>">

        <div class="menu_visao">

          <a href="<?php echo base_url("Equipes"); ?>" class="btn btn-light"><i class="fa fa-chevron-left"
              aria-hidden="true"></i> Voltar</a>
          <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Salvar
            alterações</button>

        </div>

        <div class="container-fluid">
          <?php
            if(isset($_GET['ret'])){
              if($_GET['ret'] == 'S'){
                echo "<div class='alert alert-success' role='alert'>Ação executada com sucesso!</div>";
              }
              else if($_GET['ret'] == 'N'){
                echo "<div class='alert alert-danger' role='alert's>A simple danger alert—check it out!</div>";
              }
            }
          ?>
          <ul class="nav nav-tabs" id="mytab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#principal" role="tab"
                aria-controls="principal" aria-selected="true"><i class="fa fa-pencil" aria-hidden="true"></i>
                Descrição</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="atletas_equipe_tab" data-toggle="tab" href="#atletas" role="tab"
                aria-controls="atletas" aria-selected="true"><i class="fa fa-users" aria-hidden="true"></i>
                Atletas</a>
            </li>
          </ul>

          <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="principal" role="tabpanel" aria-labelledby="home-tab">

              <div class="row">

                <div class="col-md-12">

                  <label for="txtDescricao">Nome: <span class="text-danger">*</span></label>
                  <input type="text" id="txtDescricao" name="txtDescricao" class="form-control"
                    value="<?php echo $equipe->DESCRICAO; ?>" required />

                </div>

              </div>

              <br />

            </div><!-- tab principal -->

            <div class="tab-pane fade show" id="atletas" role="tabpanel" aria-labelledby="atletas_equipe_tab">
                <div class="row">
                    <div class="col-md-12">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_inserir_atleta_equipe">
                        <i class="fa fa-plus" aria-hidden="true"></i> Inserir Atleta
                      </button>
                    </div>
                </div>
                <br>
                <div class="row">    
                    <div class="col-md table-responsive">
                      <?php
                        if(count($atletas_equipes) > 0){
                          $ultimo_atleta = 0;
                          // var_dump($atletas_equipes);
                          echo "<table id='tab_atletas' class='table table-hover table-condensed table-striped'>
                                  <thead>
                                    <tr>
                                      <th>Cód:.</th>
                                      <th>Foto</th>
                                      <th>Nome</th>
                                      <th>Curso</th>
                                      <th>Posição</th>
                                      <th class='text-center'>Ações</th>
                                    </tr>
                                  </thead>
                                  <tbody>";
                    
                                  foreach($atletas_equipes as $val){
                                      if($val->IDATLETA != $ultimo_atleta){
                                          $posicoes = [];
                                            foreach($atletas_equipes as $dado){
                                              if($dado->IDATLETA == $val->IDATLETA){
                                                $posicoes[] = $dado->POSICAO;
                                              }
                                            }

                                            $posicoes = array_unique($posicoes);
                                            // $posicoes = implode($posicoes);
                                          $imagem = "<img class='img-fluid' src='".base_url("imagens/alunos/".$val->FOTOATLETA)."' style='width:5rem; '>";
                                          ?>

                                            <tr>
                                                <td><?php echo $val->IDATLETA;?></td>
                                                <td><?php echo $imagem;?></td>
                                                <td><?php echo $val->NOMEATLETA;?></td>
                                                <td><?php echo $val->CURSO;?></td>
                                                <td><?php
                                                $vez = 0;
                                                $lenght = count($posicoes);
                                                  foreach($posicoes as $i => $pVal){
                                                    $vez++;
                                                    if($vez == $lenght){
                                                      echo $pVal;
                                                    }
                                                    else{
                                                      echo $pVal.',';
                                                    }
                                                    
                                                  }
                                                  ?></td>
                                                <td class='text-center'>
                                                  <a href="<?php echo base_url("Atletas/editar_atleta/".$val->IDATLETA); ?>" class='btn btn-primary btn-sm' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil'></i></a>
                                                  
                                                  <button class='btn btn-danger btn-sm btnExcluir' title='Excluir' data-idatleta='<?php echo $val->IDATLETA; ?>'><i class='fa fa-times'></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                            $ultimo_atleta = $val->IDATLETA;
                                      }
                                    }
                
                          echo "</tbody>
                              </table>";
                        }
                        else{
                          // var_dump($atletas_equipes);
                          echo "A equipe não possui nenhum atleta inserido até o momento";
                        }
                      ?>

                    </div>
                </div>
                <!-- fim row -->
            </div>

          </div>

        </div><!-- /.conainer-fluid -->

      </form>

    </main>

  </div>


  <div class="modal fade" tabindex="-1" role="dialog" id="modal_excluir_filial">
    <div class="modal-dialog modal-danger" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-times" aria-hidden="true"></i> Remover Filial do Usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>

        <form id="formExcluirFilial" method="post" action="<?php echo base_url("Admin/excluir_filial_usuario"); ?>">

          <input type="hidden" id="txtIdUsuarioFilial_del" name="txtIdUsuarioFilial_del" value="" />

          <div class="modal-body">

            <strong style="color:red;">Tem certeza que deseja remover a filial selecionada do usuário?</strong>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Sim, Excluir</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>

        </form>

      </div>
    </div>
  </div><!-- modal excluir filial -->

  <div class="modal fade" tabindex="-1" role="dialog" id="modal_inserir_atleta_equipe">
    <div class="modal-dialog modal-primary" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus" aria-hidden="true"></i> Inserir Atleta na Equipe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>

        <form id="formInserirAtletaEquipe" method="post" action="<?php echo base_url("AtletasEquipes/inserir"); ?>">
          <input type="hidden" name="txtIdEquipe" value="<?php echo $equipe->IDEQUIPE; ?>"/>
          <div class="modal-body">

            <div class="row">

              <div class="col-md-12">
                
                <label for="txtIdAtleta">Atleta: <span class="text-danger">*</span></label>
                <select id="txtIdAtleta" name="txtIdAtleta" class="form-control">
                   <?php
                    if(count($atletas) > 0){
                      //encontrou atletas
                      foreach($atletas as $val){?>
                        <option value="<?php echo $val->IDALUNO; ?>"><?php echo $val->NOME." (".$val->CURSO.")"; ?></option>
                     <?php
                      }
                    }
                   ?>
                </select>

              </div>

            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Inserir</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
  <!-- modal nova equipe -->


  <!-- Bootstrap and necessary plugins -->
  <script src="<?php echo base_url(); ?>/assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/pace.min.js"></script>

  <!-- CoreUI main scripts -->
  <script src="<?php echo base_url(); ?>/coreui/js/app.js"></script>

  <script>
      $(function(){
        //datatables
        $('#tab_atletas').DataTable({

          paging: true,
          responsive: true,
          "order": [[ 0, "desc" ]]
        });
      });
  </script>

</body>

</html>