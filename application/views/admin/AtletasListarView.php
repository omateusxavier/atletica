<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $this->configsite->TITULOSITE; ?> - Atletas</title>

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

  <!-- SELECT 2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
        <li class="breadcrumb-item">Atletas</li>
      </ol>

      <div class="menu_visao">

        <div class="row">

          <div class="col-sm">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_novo"><i
                class="fa fa-plus" aria-hidden="true"></i> Novo Atleta</button>
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
              echo "<div class='alert alert-danger'>Erro ao executar a operação! Contate o administrador do sistema</div>";
            }
            else if($_GET['ret'] == 'possui'){
              echo "<div class='alert alert-danger'>Erro ao adicionar atleta. O RA já esta cadastrado!</div>";
            }
          }
        ?>

        <div class="row">

          <div class="col-md table-responsive">

            <?php
            
              if(count($atletas) > 0){
              
                echo "<table id='tab_atletas' class='table table-hover table-condensed table-striped'>
                        <thead>
                          <tr>
                            <th>RA:.</th>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Curso</th>
                            <th>Tipo</th>
                            
                            <th class='text-center'>Ações</th>
                          </tr>
                        </thead>
                      <tbody>";
                    
                  foreach($atletas as $val){
                    
                    $ultima_alt = "";
                    
                    if($val->DATAALT != ''){
                      $DATAALT = nice_date($val->DATAALT, 'd/m/Y');
                    }
                    if($val->DATACAD != ''){
                      $DATACAD = nice_date($val->DATACAD, 'd/m/Y');
                    }

                    if($val->TIPO == 'C'){
                      $tipo = "Candidato";
                    }
                    else if($val->TIPO == 'A'){
                      $tipo = "Atleta";
                    }
                    
                    $imagem = "<img class='img-fluid' src='".base_url("imagens/alunos/".$val->IMAGEM)."' style='width:5rem; '>";
                                      
                                      
                    
                    echo "<tr>
                            <td>".$val->RA."</td>
                            <td>".$imagem."</td>
                            <td>".$val->NOME."</td>
                            <td>".$val->EMAIL."</td>
                            <td>".$val->TELEFONE."</td>
                            <td>".$val->CURSO."</td>
                            <td>".$tipo."</td>
                            <td class='text-center'>
                              <a href='" . base_url("Atletas/editar_atleta/" . $val->IDALUNO) . "' class='btn btn-primary btn-sm' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil'></i></a>
                              
                              <button class='btn btn-danger btn-sm btnExcluir' title='Excluir' data-idatleta='" . $val->IDALUNO . "'><i class='fa fa-times'></i></button>
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
        <!-- fim row -->

      </div><!-- /.conainer-fluid -->

    </main>

  </div>


  <div class="modal fade" tabindex="-1" role="dialog" id="modal_novo">
    <div class="modal-dialog modal-primary modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus" aria-hidden="true"></i> Novo Atleta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>

        <!-- <form id="formNovo" method="post" action="<?php echo base_url("Atletas/inserir_atleta"); ?>"> -->
        <form id="formNovo" method="post" enctype="multipart/form-data"
          action="<?php echo base_url("Atletas/inserir_atleta"); ?>">

          <div class="modal-body">

            <div class="row">
              <div class="col-md-7">
                <div class="row">

                  <div class="col-md-12">

                    <label for="txtNome">Nome: <span class="text-danger">*</span></label>
                    <input type="text" id="txtNome" name="txtNome" class="form-control" required />

                  </div>

                  <div class="col-md-12">

                    <label for="txtRA">RA: <span class="text-danger">*</span></label>
                    <input type="text" id="txtRA" name="txtRA" class="form-control" required />

                  </div>

                  <div class="col-md-12">

                    <label for="txtEmail">E-mail: <span class="text-danger">*</span></label>
                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" />

                  </div>

                  <div class="col-md-12">

                    <label for="txtTelefone">Telefone: <span class="text-danger">*</span></label>
                    <input type="phone" id="txtTelefone" name="txtTelefone" class="form-control" />

                  </div>

                  <div class="col-md-12">
                    <label for="txtIdGenero">Gênero: <span class="text-danger">*</span></label>
                      <select id="txtIdGenero" name="txtIdGenero" class="form-control">
                        <?php 
                          if(isset($generos)){
                            foreach($generos as $val){?>
                              <option value="<?php echo $val->IDGENERO; ?>"><?php echo $val->DESCRICAO; ?></option>
                            <?php
                            }
                          } 
                        ?>
                      </select>
                  </div>

                  <div class="col-md-12">
                    <label for="txtIdCurso">Curso: <span class="text-danger">*</span></label>
                      <select id="txtIdCurso" name="txtIdCurso" class="form-control">
                        <?php 
                          if(isset($cursos)){
                            foreach($cursos as $val){?>
                              <option value="<?php echo $val->IDCURSO; ?>"><?php echo $val->DESCRICAO; ?></option>
                            <?php
                            }
                          } 
                        ?>
                      </select>
                  </div>

                  <div class="col-md-12">
                    <label for="txtIdModalidade">Modalidade: <span class="text-danger">*</span></label>
                      <select id="txtIdModalidade" name="txtIdModalidade[]" class="form-control" multiple>
                        <?php 
                          if(isset($modalidades)){
                            foreach($modalidades as $val){?>
                              <option value="<?php echo $val->IDMODALIDADE; ?>"><?php echo $val->DESCRICAO; ?></option>
                            <?php
                            }
                          } 
                        ?>
                      </select>
                  </div>

                  <div class="col-md-12">
                    <label for="txtIdPosicao">Posição: <span class="text-danger">*</span></label>
                      <select id="txtIdPosicao" name="txtIdPosicao[]" class="form-control" multiple>
                        
                      </select>
                  </div>

                  <!-- <div class="col-md-12">
                    <label for="txtIdPosicao">Posições: <span class="text-danger">*</span></label>
                      <select id="txtIdPosicao" name="txtIdPosicao" class="form-control">
                        <?php 
                          if(isset($posicoes_modalidades)){
                            foreach($posicoes_modalidades as $val){?>
                              <option value="<?php echo $val->IDPOSICAOMODALIDADE; ?>"><?php echo $val->POSICAO. " (".$val->MODALIDADE.")"; ?></option>
                            <?php
                            }
                          } 
                        ?>
                      </select>
                  </div> -->
                  
                </div>
              </div>

              <div clss="col-md-5">
                <!-- <div class="row"> -->
                <!-- <div class="col-md-12"> -->
                <label>Foto:</label>
                <input type="file" id="txtImagem" name="txtImagem" accept="image/*" />

                <button type="button" class="btn btn-light btn-block" id="btnEscolherImagem" style="height:160px;">
                  <i class="fa fa-picture-o fa-3x" aria-hidden="true"></i>
                  <br />
                  Clique aqui para selecionar uma imagem

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
  <!-- modal novo usuario -->


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

                <input type="hidden" id="txtIdAtleta_del" name="txtIdAtleta_del" value="" />

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
    $('#tab_atletas').DataTable({

      paging: true,
      responsive: true,
      "order": [[ 0, "desc" ]]
    });

    // SELECT 2
    $(document).ready(function() {
        $('#txtIdModalidade').select2({
            theme: "classic",
			      width:'resolve',
			      language: "pt-BR"
        });

        $('#txtIdPosicao').select2({
            theme: "classic",
			      width:'resolve',
			      language: "pt-BR"
        });
    });

    //ao escolher modalidade realizar consulta trazendo as posições
    $('#txtIdModalidade').change(function() {
        
        $('#txtIdPosicao').empty();
        
        idmodalidade = $(this).val();
        console.log(idmodalidade);
        $('#box_carregando').fadeIn('fast');

        $.getJSON("<?php echo base_url('PosicoesModalidades/buscar_posicoes_modalidades');?>/" + idmodalidade, function(data) {
          var dados = data.posicoes;
          $.each(dados, function(i, item) {
            $('#txtIdPosicao').append($('<option>', {
              value: item.IDPOSICAOMODALIDADE,
              text: item.DESCRICAO + '(' + item.MODALIDADE+ ')'
            }));
          });
        }).done(() => {
          $('#box_carregando').fadeOut('fast');
        });

        // $('#divCodTurma').removeClass('d-none');

    });

    $(document).on('click', '.btnExcluir', function() {
      var idatleta = $(this).attr('data-idatleta');
      $('#txtIdAtleta_del').val(idatleta);

      $("#modal_excluir").modal("show");

    });

  
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