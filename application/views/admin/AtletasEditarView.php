<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $this->configsite->TITULOSITE; ?> - Editar Atleta</title>

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

  // $('[data-toggle="tooltip"]').tooltip();

  // $('#txtCep').mask('99999-999');

  $('#txtNome').focus();

  // $('#btnBuscarCep').click(function() {
  //   buscar_endereco();
  // });

  // $('#txtCep').focusout(function() {
  //   buscar_endereco();
  // });

  <?php if(isset($_GET['tab']) == 'posicoes'){ ?>

  $('#posicoes-tab').tab('show');

  <?php } else { ?>

  $('#principal-tab').tab('show');

  <?php 
  } 
  ?>
  <?php if(isset($_GET['tab']) == 'equipes'){ ?>

    $('#equipes-tab').tab('show');

  <?php 
    } 
  ?>

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
		
		$atleta = $this->AlunosModel;
		
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
        <li class="breadcrumb-item active"><?php echo $atleta->NOME; ?></li>
      </ol>

      <form id="formEditar" method="post" enctype="multipart/form-data" action="<?php echo base_url("Atletas/atualizar_atleta/" . $atleta->IDALUNO); ?>">

        <div class="menu_visao">

          <a href="<?php echo base_url("Atletas"); ?>" class="btn btn-light"><i class="fa fa-chevron-left"
              aria-hidden="true"></i> Voltar</a>
          <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>

        </div>

        <div class="container-fluid">

          <ul class="nav nav-tabs" id="mytab" role="tablist">

            <li class="nav-item">
              <a class="nav-link" id="principal-tab" data-toggle="tab" href="#principal" role="tab"
                aria-controls="principal" aria-selected="true"><i class="fa fa-user" aria-hidden="true"></i>
                Atleta</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="posicoes-tab" data-toggle="tab" href="#posicoes" role="tab"
                aria-controls="posicoes" aria-selected="true"><i class="fa fa-bars" aria-hidden="true"></i>
                Posições</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="equipes-tab" data-toggle="tab" href="#equipes" role="tab"
                aria-controls="equipes" aria-selected="true"><i class="fa fa-users" aria-hidden="true"></i>
                Equipes</a>
            </li>
          </ul>

          <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="principal" role="tabpanel" aria-labelledby="principal-tab">

              <div class="row">

                <div class="col-md-9">

                  <div class="row">

                    <div class="col-md-12">

                      <label for="txtNome">Nome: <span class="text-danger">*</span></label>
                      <input type="text" id="txtNome" name="txtNome" class="form-control"
                        value="<?php echo $atleta->NOME; ?>" />

                    </div>

                    <div class="col-md-12">

                      <label for="txtRA">RA: <span class="text-danger">*</span></label>
                      <input type="text" id="txtRA" name="txtRA" class="form-control"
                        value="<?php echo $atleta->RA; ?>" />

                    </div>

                  </div>

                  <hr />

                  <div class="row">

                    <div class="col-md-6">

                      <label for="txtEmail">Email: <span class="text-danger">*</span></label>
                      <input type="email" id="txtEmail" name="txtEmail" class="form-control"
                        value="<?php echo $atleta->EMAIL; ?>" />

                    </div>

                    <div class="col-md-4">

                      <label for="txtTelefone">Telefone: <span class="text-danger">*</span></label>
                      <input type="phone" id="txtTelefone" name="txtTelefone" class="form-control"
                        value="<?php echo $atleta->TELEFONE; ?>" required />

                    </div>

                  </div>

                  <div class="row">
                    <!-- <div class="col-md-12">

                      <label for="txtSituacao">Situação: <span class="text-danger">*</span></label>
                        <select id="txtSituacao" name="txtSituacao" class="form-control">
                          <?php
                            if($atleta->SITUACAO == 'C'){?>
                              <option value="A">Atleta</option>
                              <option value="C" selected>Candidato</option>
                            <?php
                            }
                            else if ($atleta->SITUACAO == 'A'){?>
                              <option value="A" selected>Atleta</option>
                              <option value="C">Candidato</option>
                            <?php
                            }
                          ?>
                          
                        </select>

                    </div> -->

                    <div class="col-md-12">
                    <label for="txtIdGenero">Gênero: <span class="text-danger">*</span></label>
                      <select id="txtIdGenero" name="txtIdGenero" class="form-control">
                        <?php 
                          if(isset($generos)){
                            foreach($generos as $val){
                              $selected = "";
                              if($val->IDGENERO == $atleta->IDGENERO){
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
                              if($val->IDCURSO == $atleta->IDCURSO){
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
                          if(count($atletas_modalidades) > 0){
                            //encontrou modalidades em que o atleta participa
                            foreach($atletas_modalidades as $amVal){
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
                            echo "atletas modalidades nao foi setado";
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
                            if($atleta->TIPO == 'A'){?>
                                <option value="A" selected>Atleta</option>
                                <option value="C" >Candidato</option>
                                <option value="E" >Egresso</option>
                            <?php
                            }
                            else if($atleta->TIPO == 'C'){?>
                                <option value="A" >Atleta</option>
                                <option value="C" selected>Candidato</option>
                                <option value="E" >Egresso</option>
                            <?php
                            }
                            else if($atleta->TIPO == 'E'){?>
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

                  <?php if($atleta->IMAGEM == NULL || $atleta->IMAGEM == ''){?>
                    

                    <div class="carousel slide" id="box_carousel_edit">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <button type="button" class="btn btn-success" id="btnEscolherImagemEdit"
                          style="position:absolute;"><i class="fa fa-pencil" aria-hidden="true"></i> Trocar
                          imagem</button>
                        <img src="<?php echo base_url('imagens/alunos/' . $atleta->IMAGEM) ?>" class="d-block w-100"
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
                        <img src="<?php echo base_url('imagens/alunos/' . $atleta->IMAGEM) ?>" class="img-fluid d-block w-100"
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

            <!-- ------------------------------------------------------------- -->
            <div class="tab-pane fade" id="posicoes" role="tabpanel" aria-labelledby="posicoes-tab">

              <div class="accordion" id="accordionExample">
                <?php
                  $count = 1;
                  $ultima_modalidade = 0;
                  foreach($atletas_posicoes as $val){
                    $show = '';
                    if($count == 1){
                      $show = 'show';
                    }
                    if($val->IDMODALIDADE != $ultima_modalidade){
                    ?>
                      <div class="card">
                        <div class="card-header" id="modalidade<?php echo $count; ?>">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $count;?>" aria-expanded="true" aria-controls="collapse<?php echo $count;?>">
                              <?php echo "<h4>". $val->MODALIDADE."</h4>"; ?>
                            </button>
                          </h2>
                        </div>

                        <div id="collapse<?php echo $count; ?>" class="collapse <?php echo $show; ?>" aria-labelledby="heading<?php echo $count; ?>" data-parent="#accordionExample">
                          <div class="card-body">
                            <?php
                              foreach($atletas_posicoes as $dado){
                                if($dado->IDMODALIDADE == $val->IDMODALIDADE){
                                  echo "<h5>".$dado->POSICAO."</h5><hr>";
                                }
                              }
                            ?>
                          </div>
                        </div>

                      </div>
                  <?php
                  }
                  $count++;
                  $ultima_modalidade = $val->IDMODALIDADE;
                  }
                ?>
                
              </div>
              <!-- fim accordion -->

            </div><!-- tab posicoes -->

            <!-- ------------------------------------------------------------- -->
            <div class="tab-pane fade" id="equipes" role="tabpanel" aria-labelledby="equipes-tab">
                  <?php var_dump($atletas_equipes); ?>
                  <div class="row">
                    <?php 
                      foreach($atletas_equipes as $val){?>
                          <div class="col-md-4">
                            <div class="card rounded" style="width: 18rem;">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title"><?php echo $val->EQUIPE; ?></h5>
                                <p class="card-text"><?php echo $val->MODALIDADE." (".$val->GENERO.")" ; ?></p>
                                <a href="<?php echo base_url("Equipes/editar/".$val->IDEQUIPE); ?>" class="btn btn-primary rounded">VER MAIS</a>
                              </div>
                            </div>
                          </div>
                      <?php 
                      }
                    ?>
                      

                  </div>

            </div><!-- tab equipes -->

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

        posicoes_atleta = [<?php 
          foreach($atletas_posicoes as $val){
            echo $val->IDPOSICAOMODALIDADE.',';
          }
        ?>];

        idmodalidade = $('#txtIdModalidade').val();
        // console.log(idmodalidade);
        // console.log(posicoes_atleta);
        // $('#box_carregando').fadeIn('fast');

        $.getJSON("<?php echo base_url('PosicoesModalidades/buscar_posicoes_modalidades');?>/" + idmodalidade, function(data) {
          var dados = data.posicoes;
          $.each(dados, function(i, item) {
            selected = '';

              $.each(posicoes_atleta, function(iPosicao, valPosicao){
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

        posicoes_atleta = [<?php 
          foreach($atletas_posicoes as $val){
            echo $val->IDPOSICAOMODALIDADE.',';
          }
        ?>];

        $.getJSON("<?php echo base_url('PosicoesModalidades/buscar_posicoes_modalidades');?>/" + idmodalidade, function(data) {
          var dados = data.posicoes;
          $.each(dados, function(i, item) {
            selected = '';

              $.each(posicoes_atleta, function(iPosicao, valPosicao){
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