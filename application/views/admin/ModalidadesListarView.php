<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $this->configsite->TITULOSITE; ?> - Modalidades</title>

  <!-- Icons -->
  <link href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
    rel="stylesheet">

  <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>/assets/datatables/datatables/css/dataTables.bootstrap4.min.css">
  <script type="text/javascript" language="javascript"
    src="<?php echo base_url(); ?>/assets/datatables/datatables.min.js"></script>
  <script type="text/javascript" language="javascript"
    src="<?php echo base_url(); ?>/assets/datatables/datatables/js/dataTables.bootstrap4.min.js"></script>

  <!-- CSS do CORE UI -->
  <link href="<?php echo base_url(); ?>/coreui/css/style.css" rel="stylesheet">

  <!-- CSS próprio -->
  <link href="<?php echo base_url(); ?>/assets/css/estilo.css" rel="stylesheet">

</head>



<style>



</style>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

  <?php include "CabecalhoView.php"; ?>

  <div class="app-body">

    <?php include "MenuView.php"; ?>

    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Admin"); ?>">Home</a></li>
        <li class="breadcrumb-item">Modalidades</li>
      </ol>

      <div class="menu_visao">

        <div class="row">

          <div class="col-sm">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_novo"><i
                class="fa fa-plus" aria-hidden="true"></i> Nova Modalidade</button>
          </div>

          <div class="col-sm">

          </div>

        </div>

      </div>

      <div class="container-fluid">
        <?php 
          if(isset($_GET['ret'])){
            if($_GET['ret'] == 'S'){
              echo "<div class='alert alert-success'>Operação executada com sucesso!</div>";
            }
            else if($_GET['ret'] == 'N'){
              echo "<div class='alert alert-danger'>Houve um erro ao executar a operação, contate o administardor do Sistema!</div>";
            }
          }
        ?>

        <div class="row">

          <div class="col-md table-responsive">

            <?php
            
          if(count($modalidades) > 0){
          
            echo "<table id='tab_modalidade' class='table table-hover table-condensed table-striped'>
                <thead>
                  <tr>
                    <th>Cód:.</th>
                    <th>Descrição</th>
                    <th>Cadastrado por</th>
                    <th>Data Cadastro</th>
                    <th>Alterado por</th>
                    <th>Data Alteração</th>
                    <th class='text-center'>Ações</th>
                  </tr>
                </thead>
                <tbody>";
                
            foreach($modalidades as $val){
              $DATAALT = "";
              $DATACAD = "";
              if($val->DATAALT != ''){
                $DATAALT = nice_date($val->DATAALT, 'd/m/Y');
              }
              if($val->DATACAD != ''){
                $DATACAD = nice_date($val->DATACAD, 'd/m/Y');
              }
              echo "<tr>
                      <td>".$val->IDMODALIDADE."</td>
                      <td>".$val->DESCRICAO."</td>
                      <td>".$val->USUARIOCAD."</td>
                      <td>" . $DATACAD . "</td>
                      <td>".$val->USUARIOALT."</td>
                      <td>" . $DATAALT . "</td>
                      <td class='text-center'>
                        <a href='" . base_url("Modalidades/editar/" . $val->IDMODALIDADE) . "' class='btn btn-primary btn-sm' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil'></i></a>
                        
                        <button class='btn btn-danger btn-sm btnExcluir' title='Excluir' data-idmodalidade='" . $val->IDMODALIDADE . "'><i class='fa fa-times'></i></button>
                      </td>
                  </tr>";
            
            }
            
            echo "</tbody>
                </table>";
          
          }
          else{
            echo "<div class='text-center'><br/>Nenhum registro encontrado.<br/><br/></div>";
          }
        
        ?>

          </div>

        </div>

      </div><!-- /.conainer-fluid -->

    </main>

  </div>


  <div class="modal fade" tabindex="-1" role="dialog" id="modal_novo">
    <div class="modal-dialog modal-primary" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus" aria-hidden="true"></i> Nova Modalidade</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>

        <form id="formNovo" method="post" action="<?php echo base_url("Modalidades/inserir"); ?>">

          <div class="modal-body">

            <div class="row">

              <div class="col-md-12">

                <label for="txtDescricao">Descricao: <span class="text-danger">*</span></label>
                <input type="text" id="txtDescricao" name="txtDescricao" class="form-control" required />

              </div>

              <div class="col-md-12">

                <label for="txtGenero"><span class="text-danger">*</span></label>
                <select id="txtGenero" name="txtGenero" class="form-control">
                    <option value="M">Masculino</option>
                    <option value="F">Fêminino</option>
                  </select>

              </div>


            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
  <!-- modal nova modalidade -->


  <div class="modal fade" tabindex="-1" role="dialog" id="modal_excluir">
    <div class="modal-dialog modal-danger" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-times" aria-hidden="true"></i> Excluir Modalidade</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>

        <form id="formExcluir" method="post" action="<?php echo base_url("Modalidades/excluir"); ?>">

          <div class="modal-body">

            <div class="row">

              <div class="col-md-12">

                <input type="hidden" id="txtIdModalidade_del" name="txtIdModalidade_del" value="" />

                Tem certeza que deseja excluir a modalidade selecionada?

              </div>

            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Sim</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>

        </form>

      </div>
    </div>
  </div><!-- modal excluir -->


  <!-- Bootstrap and necessary plugins -->
  <script src="<?php echo base_url(); ?>/assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/pace.min.js"></script>

  <!-- CoreUI main scripts -->
  <script src="<?php echo base_url(); ?>/coreui/js/app.js"></script>

  <script>
  $(function() {

    $(document).on('click', '.btnExcluir', function() {
      console.log('ciclou excluir')
      var idmodalidade = $(this).attr('data-idmodalidade');
      $('#txtIdModalidade_del').val(idmodalidade);

      $("#modal_excluir").modal("show");

    });

  });
  </script>
</body>

</html>