<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $this->configsite->TITULOSITE; ?> - Editar Posição</title>

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
  
  <!-- SELECT 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<script>
    <?php if(isset($_GET['tab']) == 'principal'){ ?>

        $('#principal-tab').tab('show');

        <?php } else if(isset($_GET['tab']) == 'modalidades') { ?>

        $('#modalidades-tab').tab('show');

    <?php } ?>
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
		
		$posicao = $this->PosicoesModel;
		
	?>

  <div class="app-body">

    <?php include "MenuView.php"; ?>

    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Admin"); ?>">Home</a></li>
        <li class="breadcrumb-item">Globais</li>
        <li class="breadcrumb-item"><a href="<?php echo base_url("Posicoes"); ?>">Posições</a></li>
        <li class="breadcrumb-item active"><?php echo $posicao->DESCRICAO; ?></li>
      </ol>

      <form id="formEditar" method="post"
        action="<?php echo base_url("Posicoes/atualizar/" . $posicao->IDPOSICAO); ?>">

        <div class="menu_visao">

          <a href="<?php echo base_url("Posicoes"); ?>" class="btn btn-light"><i class="fa fa-chevron-left"
              aria-hidden="true"></i> Voltar</a>
          <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>

        </div>

        <div class="container-fluid">

          <ul class="nav nav-tabs" id="mytab" role="tablist">

            <li class="nav-item">
              <a class="nav-link active" id="principal-tab" data-toggle="tab" href="#principal" role="tab"
                aria-controls="principal" aria-selected="true"><i class="fa fa-bars" aria-hidden="true"></i>
                Posição</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="modalidades-tab" data-toggle="tab" href="#modalidades" role="tab"
                aria-controls="modalidades" aria-selected="true"><i class="fa fa-bars" aria-hidden="true"></i>
                Modalidades da Posição</a>
            </li>
          </ul>

          <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="principal" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-md-12">
                    <label for="txtDescricao">Descrição: <span class="text-danger">*</span></label>
                      <input type="text" id="txtDescricao" name="txtDescricao" class="form-control"
                        value="<?php echo $posicao->DESCRICAO; ?>" />
                    </div>
                </div>

            </div><!-- tab principal -->

            <div class="tab-pane" id="modalidades" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_nova_posicao_modalidade"><i
                        class="fa fa-plus" aria-hidden="true"></i> Nova modalidade</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table id='tab_equipes' class='table table-hover table-condensed table-striped'>
                            <thead>
                                <tr>
                                    <th>Modalidades</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(count($posicoes_modalidades) > 0){
                                        // $modalidades = [];
                                        foreach($posicoes_modalidades as $val){
                                            $modalidades_array[] = $val->MODALIDADE;
                                        }
                                        $modalidades_array = array_unique($modalidades_array);

                                        foreach($modalidades_array as $i => $dado){
                                            echo "<tr><td>".$dado."</td></tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div><!-- tab principal -->

          </div>

        </div><!-- /.conainer-fluid -->

      </form>

    </main>

  </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="modal_nova_posicao_modalidade">
    <div class="modal-dialog modal-primary" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus" aria-hidden="true"></i> Nova Modalidade da Posição</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>

        <form id="formNovo" method="post" action="<?php echo base_url("PosicoesModalidades/inserir"); ?>">
            <input type="hidden" id="txtIdPosicao" name="txtIdPosicao" value="<?php echo $posicao->IDPOSICAO ?>">
          <div class="modal-body">

            <div class="row">

              <div class="col-md-12">

                <label for="txtModalidade">Modalidade:  <span class="text-danger">*</span></label>
                <select id="txtModalidade" name="txtModalidade[]" class="form-control" multiple required>
                    <?php
                        if(count($modalidades) > 0){
                            foreach($modalidades as $val){?>
                                <option value="<?php echo $val->IDMODALIDADE; ?>"><?php echo $val->DESCRICAO; ?></option>
                            <?php
                            }
                        }
                    ?>
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

  <!-- Bootstrap and necessary plugins -->
  <script src="<?php echo base_url(); ?>/assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/pace.min.js"></script>

  <!-- CoreUI main scripts -->
  <script src="<?php echo base_url(); ?>/coreui/js/app.js"></script>

  <script>
    $(document).ready(function() {
        $('#txtModalidade').select2({
            theme: "classic",
			      width:'resolve',
			      language: "pt-BR"
        });
    });
  </script>

</body>

</html>