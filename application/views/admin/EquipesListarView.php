<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $this->configsite->TITULOSITE; ?> - Equipes</title>

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

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>/assets/datatables/datatables/css/dataTables.bootstrap4.min.css">
  <script type="text/javascript" language="javascript"
    src="<?php echo base_url(); ?>/assets/datatables/datatables.min.js"></script>
  <script type="text/javascript" language="javascript"
    src="<?php echo base_url(); ?>/assets/datatables/datatables/js/dataTables.bootstrap4.min.js"></script>

</head>



<style>

  #txtImagem,
  #txtImagemEdit,
  #box_carousel,
  #txtCapa {
    display: none;
  }

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
        <li class="breadcrumb-item">Equipes</li>
      </ol>

      <div class="menu_visao">

        <div class="row">

          <div class="col-sm">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_novo"><i
                class="fa fa-plus" aria-hidden="true"></i> Nova Equipe</button>
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
              echo "<div class='alert alert-danger'>Houve um erro ao executar a operação contade o administardor do Sistema!</div>";
            }
          }
        ?>

        <div class="row">

          <div class="col-md table-responsive">

            <?php
            
          if(count($equipes) > 0){
          
            echo "<table id='tab_equipes' class='table table-hover table-condensed table-striped'>
                <thead>
                  <tr>
                    <th>Cód:.</th>
                    <th>Logo:.</th>
                    <th>Nome</th>
                    <th>Modalidade</th>
                    <th>Cadastrado por</th>
                    <th>Data Cadastro</th>
                    <th>Alterado por</th>
                    <th>Data Alteração</th>
                    <th class='text-center'>Ações</th>
                  </tr>
                </thead>
                <tbody>";
                
            foreach($equipes as $val){
              $DATAALT = "";
              $DATACAD = "";
              if($val->DATAALT != ''){
                $DATAALT = nice_date($val->DATAALT, 'd/m/Y');
              }
              if($val->DATACAD != ''){
                $DATACAD = nice_date($val->DATACAD, 'd/m/Y');
              }

              if(count($modalidades) > 0){
                //encontrou modalidades
                foreach($modalidades as $dado){
                  if($dado->IDMODALIDADEGENERO == $val->IDMODALIDADEGENERO){
                    $modalidade = $dado->MODALIDADE . " (".$dado->GENERO.")";
                  }
                }
              }

              if($val->LOGO != '' || $val->LOGO != null){
                $logo = "<img class='img-fluid' src='".base_url("imagens/equipes/logos/".$val->LOGO)."' style='width:5rem; '>";
              }
              else{
                $logo = "<img class='img-fluid' src='".base_url("imagens/equipes/logos/semfoto.jpg")."' style='width:5rem; '>";
              }
              
                                
                                
              
              echo "<tr>
                      <td>".$val->IDEQUIPE."</td>
                      <td>".$logo."</td>
                      <td><a href='" . base_url("Equipes/editar/" . $val->IDEQUIPE) . "'>".$val->DESCRICAO."</a></td>
                      <td>".$modalidade."</td>
                      <td>".$val->USUARIOCAD."</td>
                      <td>" . $DATACAD . "</td>
                      <td>".$val->USUARIOALT."</td>
                      <td>" . $DATAALT . "</td>
                      <td class='text-center'>
                        <a href='" . base_url("Equipes/editar/" . $val->IDEQUIPE) . "' class='btn btn-primary btn-sm' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil'></i></a>
                        
                        <button class='btn btn-danger btn-sm btnExcluir' title='Excluir' data-idequipe='" . $val->IDEQUIPE . "'><i class='fa fa-times'></i></button>
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
    <div class="modal-dialog modal-primary modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus" aria-hidden="true"></i> Nova Equipe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>

        <form id="formNovo" method="post" enctype="multipart/form-data" action="<?php echo base_url("equipes/inserir"); ?>">

          <div class="modal-body">

            <div class="row">
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-12">

                    <label for="txtDescricao">Descricao: <span class="text-danger">*</span></label>
                    <input type="text" id="txtDescricao" name="txtDescricao" class="form-control" required />

                  </div>
                  <br>
                  <div class="col-md-12">

                    <label for="txtModalidade">Modalidade: <span class="text-danger">*</span></label>
                    <select id="txtModalidade" name="txtModalidade" class="form-control">
                      <?php
                        if(count($modalidades_generos) > 0){
                          //encontrou modalidades
                          foreach($modalidades_generos as $val){?>
                            <option value="<?php echo $val->IDMODALIDADEGENERO; ?>"><?php echo $val->MODALIDADE."(".$val->GENERO.")"; ?></option>
                        <?php
                          }
                        }
                      ?>
                    </select>

                  </div>
                </div>
              </div>      
              
              <div class="col-md-4">
                <label>Foto:</label>
                  <input type="file" id="txtImagem" name="txtImagem" accept="image/*" />

                  <button type="button" class="btn btn-light btn-block" id="btnEscolherImagem" style="height:160px;">
                    <i class="fa fa-picture-o fa-3x" aria-hidden="true"></i>
                    <br />
                      Logo da equipe

                  </button>

                  <div class="carousel slide" id="box_carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <button type="button" class="btn btn-success" id="btnTrocarImagem" style="position:absolute;"><i
                            class="fa fa-pencil" aria-hidden="true"></i> Trocar
                          imagem</button>
                        <img src="" class="d-block w-100" id="imagem_slide" style="height:200px;" />
                      </div>
                    </div>
                  </div>

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
  <!-- modal nova equipe -->


  <div class="modal fade" tabindex="-1" role="dialog" id="modal_excluir">
    <div class="modal-dialog modal-danger" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-times" aria-hidden="true"></i> Excluir Atléta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>

        <form id="formExcluir" method="post" action="<?php echo base_url("Atletas/excluir_atleta"); ?>">

          <div class="modal-body">

            <div class="row">

              <div class="col-md-12">

                <input type="hidden" id="txtIdEquipe_del" name="txtIdEquipe_del" value="" />

                Tem certeza que deseja excluir o atleta selecionado?

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

    //datatables
    $('#tab_equipes').DataTable({
      paging: true,
      responsive: true,
      "order": [[ 0, "asc" ]]
    });

    $(document).on('click', '.btnExcluir', function() {
      console.log('ciclou excluir')
      var idequipe = $(this).attr('data-idequipe');
      $('#txtIdEquipe_del').val(idequipe);

      $("#modal_excluir").modal("show");

    });

    // escolher imagem equipe
      $('#btnEscolherImagem, #btnTrocarImagem').click(function() {
        $('#txtImagem').click();
      });

      $("#txtImagem").on('change', function() {
        var nomeimg = $('#txtImagem').val();
        console.log(nomeimg);

        if (typeof(FileReader) != "undefined") {

          var image_holder = $("#imagem_slide");
          image_holder.empty();

          var reader = new FileReader();
          reader.onload = function(e) {
            $('#imagem_slide').attr('src', e.target.result);

            $('#btnEscolherImagem').fadeOut('fast', function() {
              $('#box_carousel').fadeIn('fast');
            });

          }
          image_holder.show();
          reader.readAsDataURL($(this)[0].files[0]);
        } else {
          alert("Este navegador nao suporta FileReader.");
        }
      });

  });
  </script>
</body>

</html>