<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $this->configsite->TITULOSITE; ?> - Admin</title>

  <!-- Icons -->
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
    rel="stylesheet">

  <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>

  <!-- Main styles for this application -->
  <link href="<?php echo base_url(); ?>/coreui/css/style.css" rel="stylesheet">
  <!-- Styles required by this views -->

</head>

<style>
@media(max-width: 400px) {

  .container {
    padding-left: 5px;
    padding-right: 5px;
  }

}
</style>

<body class="app header-fixed sidebar-fixed aside-menu-off-canvas aside-menu-hidden">

  <?php include "CabecalhoView.php"; ?>

  <div class="app-body">

    <?php include "MenuView.php"; ?>

    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
      </ol>

      <div class="container">
        <?php if($_SESSION['login'][0]->IDPERFIL != 1){
                    
                } else { ?>
        <div class="row">
          <div class='col-md-12'>
            <div class="col-md-3 col-sm-4">

              <div class="card-group">
                <div class="card">
                  <div class="card-body">
                    <div class="h1 text-muted text-left mb-4">
                      EQUIPES
                    </div>

                    <?php
                        if(isset($equipes)){
                            if(count($equipes) > 0){
                                echo "10";
                            }
                            
                        }
                        else{
                            echo "nenhuma equipe cadastrada";
                        }
                    ?>


                    <div class="progress progress-xs mt-3 mb-0">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="card-footer" style="padding:0px;">
                    <a href="<?php echo base_url("Equipes/listar_equipes"); ?>" class="btn btn-success btn-block"><i
                        class="fa fa-eye" aria-hidden="true"></i> Visualizar</a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <?php } ?>
        <br />

        <div class="animated fadeIn">



        </div>

      </div><!-- /.conainer-fluid -->

    </main>

  </div><!-- app-body -->

  <!-- Bootstrap and necessary plugins -->

  <script src="<?php echo base_url(); ?>/assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/pace.min.js"></script>

  <!-- Plugins and scripts required by all views -->
  <!--<script src="<?php //echo base_url(); ?>/assets/js/Chart.min.js"></script>-->

  <!-- CoreUI main scripts -->
  <script src="<?php echo base_url(); ?>/coreui/js/app.js"></script>

  <script src="<?php echo base_url(); ?>/coreui/js/views/main.js"></script>



  <script>
  $(function() {


  });
  </script>

  <div class="modal fade" tabindex="-1" role="dialog" id="modal_detalhe_calendario">
    <div class="modal-dialog modal-primary" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-info-circle" aria-hidden="true"></i> Detalhes do Compromisso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>

        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>

      </div>
    </div>
  </div><!-- modal editar compromisso -->

</body>

</html>