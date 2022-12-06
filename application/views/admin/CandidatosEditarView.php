<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $this->configsite->TITULOSITE; ?> - Editar Candidato</title>

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
		
		$candidato = $this->AlunosModel;
		
	?>

  <div class="app-body">

    <?php include "MenuView.php"; ?>

    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Admin"); ?>">Home</a></li>
        <li class="breadcrumb-item">Globais</li>
        <li class="breadcrumb-item"><a href="<?php echo base_url("Candidatos"); ?>">Candidatos</a></li>
        <li class="breadcrumb-item active"><?php echo $candidato->NOME; ?></li>
      </ol>

      <form id="formEditar" method="post" enctype="multipart/form-data" action="<?php echo base_url("Candidatos/atualizar/" . $candidato->IDALUNO); ?>">

        <div class="menu_visao">

          <a href="<?php echo base_url("Candidatos"); ?>" class="btn btn-light"><i class="fa fa-chevron-left"
              aria-hidden="true"></i> Voltar</a>
          <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>

        </div>

        <div class="container-fluid">

          <ul class="nav nav-tabs" id="mytab" role="tablist">

            <li class="nav-item">
              <a class="nav-link" id="permissao-tab" data-toggle="tab" href="#permissao" role="tab"
                aria-controls="permissao" aria-selected="true"><i class="fa fa-user" aria-hidden="true"></i>
                Candidato</a>
            </li>
          </ul>

          <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="principal" role="tabpanel" aria-labelledby="home-tab">

              <div class="row">

                <div class="col-md-9">

                  <div class="row">

                    <div class="col-md-12">

                      <label for="txtNome">Nome: <span class="text-danger">*</span></label>
                      <input type="text" id="txtNome" name="txtNome" class="form-control"
                        value="<?php echo $candidato->NOME; ?>" />

                    </div>

                    <div class="col-md-12">

                      <label for="txtRA">RA: <span class="text-danger">*</span></label>
                      <input type="text" id="txtRA" name="txtRA" class="form-control"
                        value="<?php echo $candidato->RA; ?>" />

                    </div>

                  </div>

                  <hr />

                  <div class="row">

                    <div class="col-md-6">

                      <label for="txtEmail">Email: <span class="text-danger">*</span></label>
                      <input type="email" id="txtEmail" name="txtEmail" class="form-control"
                        value="<?php echo $candidato->EMAIL; ?>" />

                    </div>

                    <div class="col-md-4">

                      <label for="txtTelefone">Telefone: <span class="text-danger">*</span></label>
                      <input type="phone" id="txtTelefone" name="txtTelefone" class="form-control"
                        value="<?php echo $candidato->TELEFONE; ?>" required />

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-12">
                    <label for="txtIdGenero">Gênero: <span class="text-danger">*</span></label>
                      <select id="txtIdGenero" name="txtIdGenero" class="form-control">
                        <?php 
                          if(isset($generos)){
                            foreach($generos as $val){
                              $selected = "";
                              if($val->IDGENERO == $candidato->IDGENERO){
                                $selected = "selected";
                              }
                              ?>
                              <option value="<?php echo $val->IDGENERO; ?>"<?php echo $selected; ?>><?php echo $val->DESCRICAO; ?></option>
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
                            foreach($cursos as $val){
                              $selected = "";
                              if($val->IDCURSO == $candidato->IDCURSO){
                                $selected = "selected";
                              }
                              ?>
                              <option value="<?php echo $val->IDCURSO; ?>" <?php echo $selected; ?>><?php echo $val->DESCRICAO; ?></option>
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
                          if(count($candidatos_modalidades) > 0){
                            //encontrou modalidades em que o candidato participa
                            foreach($candidatos_modalidades as $amVal){
                              $modalidadesPraticadas[] = $amVal->IDMODALIDADE;
                            }
                          }

                          if(isset($modalidades)){
                            foreach($modalidades as $val){ 
                              $selected = "";
                              if(in_array($val->IDMODALIDADE, $modalidadesPraticadas)){
                                $selected = "selected";
                              }
                                ?>
                                  <option value="<?php echo $val->IDMODALIDADE; ?>" <?php echo $selected; ?>> <?php echo $val->DESCRICAO; ?> </option>
                                <?php
                            }
                          }
                          else{
                            echo "candidatos modalidades nao foi setado";
                          }
                        ?>
                      </select>
                  </div>

                  <div class="col-md-12">
                    <label for="txtIdPosicao">Posição: <span class="text-danger">*</span></label>
                      <select id="txtIdPosicao" name="txtIdPosicao[]" class="form-control" multiple>
                      
                      </select>
                  </div>

                  <div class="col-md-12">
                    <label for="txtTipo">Tipo: <span class="text-danger">*</span></label>
                      <select id="txtTipo" name="txtTipo" class="form-control">
                          <?php 
                            if($candidato->TIPO == 'A'){?>
                                <option value="A" selected>Atleta</option>
                                <option value="C" >Candidato</option>
                                <option value="E" >Egresso</option>
                            <?php
                            }
                            else if($candidato->TIPO == 'C'){?>
                                <option value="A" >Atleta</option>
                                <option value="C" selected>Candidato</option>
                                <option value="E" >Egresso</option>
                            <?php
                            }
                            else if($candidato->TIPO == 'E'){?>
                              <option value="A" >Atleta</option>
                              <option value="C" >Candidato</option>
                              <option value="E" selected>Egresso</option>
                          <?php
                          }
                          ?>
                      </select>
                  </div>
                  
                  </div>



                </div>

                <div class="col-md-3">

                  <input type="file" id="txtImagemEdit" name="txtImagemEdit" accept="image/*" />

                  <?php if($candidato->IMAGEM == NULL || $candidato->IMAGEM == ''){?>

                    <div class="carousel slide" id="box_carousel_edit">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <button type="button" class="btn btn-success" id="btnEscolherImagemEdit"
                          style="position:absolute;"><i class="fa fa-pencil" aria-hidden="true"></i> Trocar
                          imagem</button>
                        <img src="<?php echo base_url('imagens/alunos/' . $candidato->IMAGEM) ?>" class="d-block w-100"
                          id="imagem_slideEdit" style="height:200px;" />
                      </div>
                    </div>
                  </div>
                  <?php
                    } 
                    else{?>
                  <!-- Se possui imagem -->
                  <div class="carousel slide" id="box_carousel_edit">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <button type="button" class="btn btn-success" id="btnTrocarImagemEdit"
                          style="position:absolute;"><i class="fa fa-pencil" aria-hidden="true"></i> Trocar
                          imagem</button>
                        <img src="<?php echo base_url('imagens/alunos/' . $candidato->IMAGEM) ?>" class="img-fluid d-block w-100"
                          id="imagem_slideEdit" style="height:200px;" />
                      </div>
                    </div>
                  </div>
                  <?php
                    }
                    ?>

                </div>

              </div>

              <hr />

            </div><!-- tab principal -->

          </div>

        </div><!-- /.conainer-fluid -->

      </form>

    </main>

  </div>

  <script>
  $(function() {
    //possui imagem e quer trocar
    $(document).on('click', '#btnTrocarImagemEdit, #btnEscolherImagemEdit', function() {
      $('#txtImagemEdit').click();

      $("#txtImagemEdit").on('change', function() {
        var nomeimg = $('#txtImagemEdit').val();
       

        if (this.files && this.files[0]) {
          let r = new FileReader();
          
          r.onload = ((data) => {
            
            let img = document.getElementById("imagem_slideEdit");
            console.log(img);
            img.src = data.target.result;
            
            img.style.display = "block";
          });
          r.readAsDataURL(this.files[0]);
        }
        else{
          console.log('não instanciou filereader');
        }

      });

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

        posicoes_candidato = [<?php 
          foreach($candidatos_posicoes as $val){
            echo $val->IDPOSICAOMODALIDADE.',';
          }
        ?>];

        idmodalidade = $('#txtIdModalidade').val();
        // console.log(idmodalidade);
        // console.log(posicoes_candidato);
        // $('#box_carregando').fadeIn('fast');

        $.getJSON("<?php echo base_url('PosicoesModalidades/buscar_posicoes_modalidades');?>/" + idmodalidade, function(data) {
          var dados = data.posicoes;
          $.each(dados, function(i, item) {
            selected = '';

              $.each(posicoes_candidato, function(iPosicao, valPosicao){
                if(valPosicao == item.IDPOSICAOMODALIDADE){
                  selected = 'selected';
                }
              });  

            $('#txtIdPosicao').append($('<option value="'+item.IDPOSICAOMODALIDADE+' " '+ selected+'>'+item.DESCRICAO +' ('+ item.MODALIDADE +')'+ '</option>'));

          });
        });
    });

    //ao escolher modalidade realizar consulta trazendo as posições
    $('#txtIdModalidade').change(function() {
        
        $('#txtIdPosicao').empty();
        
        idmodalidade = $(this).val();

        posicoes_candidato = [<?php 
          foreach($candidatos_posicoes as $val){
            echo $val->IDPOSICAOMODALIDADE.',';
          }
        ?>];

        $.getJSON("<?php echo base_url('PosicoesModalidades/buscar_posicoes_modalidades');?>/" + idmodalidade, function(data) {
          var dados = data.posicoes;
          $.each(dados, function(i, item) {
            selected = '';

              $.each(posicoes_candidato, function(iPosicao, valPosicao){
                if(valPosicao == item.IDPOSICAOMODALIDADE){
                  selected = 'selected';
                }
              });  

            $('#txtIdPosicao').append($('<option value="'+item.IDPOSICAOMODALIDADE+' " '+ selected+'>'+item.DESCRICAO +' ('+ item.MODALIDADE +')'+ '</option>'));

          });
        });

    });




  });
  </script>


  <!-- Bootstrap and necessary plugins -->
  <script src="<?php echo base_url(); ?>/assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/pace.min.js"></script>

  <!-- CoreUI main scripts -->
  <script src="<?php echo base_url(); ?>/coreui/js/app.js"></script>

</body>

</html>