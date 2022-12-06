<header class="header-wrapper">
  <div class="topbar clearfix">
    <div class="container">
      <ul class="topbar-left">
        <li>
          <i class="fa fa-home"></i><a href="<?php echo base_url(); ?>">Home</a> | <a
            href="<?php echo base_url('Colegio'); ?>">Colégio</a> | <a
            href="<?php echo base_url('Integradas'); ?>">Integradas</a>
        </li>
        <li>
          <a target="_blank" href="http://www.fundacaojau.edu.br/portal">
            <i class="fa fa-graduation-cap"></i>Portal do aluno
          </a>
        </li>
        <li>
          <a target="_blank" href="http://www.fundacaojau.edu.br/professor">
            <i class="fa fa-users"></i>Portal do Professor</a>
        </li>
        <!-- <li>
					<a target="_blank" href="http://portal.fundacaojau.edu.br:8077/sif/UtilRM/portal_colaborador">
						<i class="fa fa-user"></i>Portal do Colaborador</a>
				</li> -->

      </ul>

      <ul class="topbar-right">
        <?php 
        $facebook = "";
        $instagram = "";
        $youtube = "";
        $twitter = "";

        foreach($links as $l){
         
          $facebook = $l['facebook'];
          $instagram = $l['instagram'];
          $youtube = $l['youtube'];
          $twitter = $l['twitter'];
        } ?>
        <li class="hidden-xs">
          <a target="_blank" href="<?php echo $twitter; ?>">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <li class="hidden-xs">
          <a target="_blank" href="<?php echo $facebook; ?>">
            <i class="fa fa-facebook"></i>
          </a>
        </li>
        <li class="hidden-xs">
          <a target="_blank" href="<?php echo $instagram; ?>">
            <i class="fa fa-instagram"></i>
          </a>
        </li>
        <li class="hidden-xs">
          <a target="_blank" href="<?php echo $youtube; ?>">
            <i class="fa fa-youtube-play"></i>
          </a>
        </li>

        <li class="hidden-xs">
          <a href="https://webmail-seguro.com.br/fundacaojau.edu.br/v2/" target="_blank" data-toggle="tooltip"
            data-placement="bottom" title="Email do colaborador">
            <i class="fa fa-envelope"></i>
          </a>
        </li>

        <li class="hidden-xs">
          <a href="http://www.fundacaojau.edu.br/portaldocolaborador" target="_blank" data-toggle="tooltip"
            data-placement="bottom" title="portal do colaborador">
            <i class="fa fa-user"></i>
          </a>
        </li>

        <li class="top-search list-inline">
          <a href="#">
            <i class="fa fa-search"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li>
              <span class="input-group">
                <input type="text" class="form-control" placeholder="Digite para pesquisar">
                <button type="submit" class="btn btn-default commonBtn">Pesquisar</button>
              </span>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

  <div class="header clearfix">
    <nav class="navbar navbar-main navbar-default">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="header_inner">

              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav"
                  aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <?php if($filial['controller'] == 2){
                                    $numerofilial = 2; ?>
                <a class="navbar-brand logo clearfix" href="<?php echo base_url('Colegio'); ?>">
                  <img src="<?php echo base_url('assets/novo/img/logo.png'); ?>" alt="Logo Colégio"
                    title="Colégio da Fundação" class="img-responsive" />
                </a>
                <?php }elseif($filial['controller'] == 3){
                                    $numerofilial = 3; ?>
                <a class="navbar-brand logo clearfix" href="<?php echo base_url('Integradas'); ?>">
                  <img src="<?php echo base_url('assets/novo/img/logointegradas.png'); ?>" alt="Logo Integradas"
                    title="Faculdades Integradas de Jaú" class="img-responsive" />
                </a>
                <?php } ?>
              </div>

              <div class="collapse navbar-collapse" id="main-nav">
                <ul class="nav navbar-nav navbar-right">
                  <?php 
									$idfilial = '';				
									$contador_nav = 1;
									foreach($navbar as $nav){
                                        $idfilial = $nav->filial;
										$menu = $contador_nav;
										$idmenu = $nav->id;
										if($menu == 1){
										$active = 'active';
										} else {
										$active = '';
										}
										if($nav->dropdown == 'S'){
										$dropdown = 'dropdown';
										$class= "class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'";
										}
										else { $dropdown = '';
											   $class= '';
										}
										?>
                  <li class="<?php echo $dropdown . " ". $active; ?>">
                    <a href="<?php echo base_url($nav->link); ?>" <?php echo $class; ?>>
                      <!-- primeiro nivel -->
                      <?php echo $nav->menu; ?>
                    </a>

                    <?php if($nav->dropdown == 'S'){ ?>
                    <ul class="dropdown-menu">
                      <?php
										$sql_drop = "select navbar.*, gfilial.nome_fantasia as nomefilial, setores.setor as nomesetor
												
														from navbar
															inner join gfilial on gfilial.id_filial = navbar.filial
															inner join setores on setores.id = navbar.idsetor
															

														where navbar.idmenudrop = ? and navbar.idsubdrop is null and navbar.status = 'P'
														
														order by navbar.posicao asc";

										$query_drop = $this->db->query($sql_drop, array($idmenu));

										$result_drop = $query_drop->result();

									foreach($result_drop as $drop){
										$idmenusub = $drop->id;
									?>
                      <?php if($drop->subdrop == 'S'){ ?>
                      <li class="dropdown">
                        <a href="<?php echo base_url($drop->link); ?>" class="dropdown-toggle" data-toggle="dropdown"
                          role="button" aria-haspopup="true" aria-expanded="false">
                          <?php echo $drop->menu; ?>
                        </a>
                        <?php } else { ?>
                      <li>
                        <a href="<?php echo base_url($drop->link); ?>"><?php echo $drop->menu; ?></a>
                        <?php }
													if($drop->subdrop == 'S'){ ?>
                        <ul class="dropdown-menu">
                          <?php
															$sql_subdrop = "select navbar.*, gfilial.nome_fantasia as nomefilial, setores.setor as nomesetor
																
																		from navbar
																			inner join gfilial on gfilial.id_filial = navbar.filial
																			inner join setores on setores.id = navbar.idsetor
																			

																		where navbar.idsubdrop = ? and navbar.status = 'P'
																		
																		order by navbar.posicao asc";

															$query_subdrop = $this->db->query($sql_subdrop, array($idmenusub));

															$result_subdrop = $query_subdrop->result();

												foreach($result_subdrop as $dropsub){
															
												?>
                          <li>
                            <a href="<?php echo base_url($dropsub->link); ?>">
                              <?php echo $dropsub->menu; ?>
                            </a>
                          </li>

                          <?php } ?>
                        </ul>
                        <?php } ?>
                      </li>

                      <?php } ?>
                    </ul>
                    <?php } ?>

                  </li>


                  <?php
                      $contador_nav = $menu + 1;
                      } ?>
                  <?php if($idfilial == 10){ ?>
                  <li class="apply_now">
                    <a href="#" id="btn-visita">Agendar visita</a>
                  </li>
                  <?php } ?>
                  <li class="visible-xs btn btn-primary">
                    <a href="http://portal.fundacaojau.edu.br:8077/sif/aluno" target="_blank">Portal do Aluno</a>
                  </li>
                  <li class="visible-xs btn btn-primary">
                    <a href="http://portal.fundacaojau.edu.br:8077/sif/professor" target="_blank">Portal do
                      Professor</a></a>
                  </li>
                  <li class="visible-xs btn btn-primary">
                    <a href="http://www.fundacaojau.edu.br/portaldocolaborador">Portal do Colaborador</a></a>
                  </li>
                  <li class="visible-xs btn btn-primary">
                    <a href="https://webmail-seguro.com.br/fundacaojau.edu.br/v2/">Email Corporativo</a></a>
                  </li>

                </ul>

              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <div id="acessoportal" class="modal fade" role="dialog">
    <?php if($idfilial == 2){
		$nomefilial = 'colegio';
	} else {
		$nomefilial = 'integradas';
	} ?>
    <form id="form_login" action="<?php echo base_url($nomefilial.'/'.'Login_externo'); ?>" method="post">
      <div class="modal-dialog">

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Acesso ao Portal do Aluno</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-5">
                <img src="<?php echo base_url('imagens/logo-portal.jpg'); ?>" class="img-responsive">

              </div>
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12">

                    <div class="form-group">
                      <label for="txtUsuario">Usuário:</label>
                      <input type="text" class="form-control" id="txtUsuario" name="txtUsuario">
                    </div>
                    <div class="form-group">
                      <label for="txtSenha">Senha:</label>
                      <input type="password" class="form-control" name="txtSenha">
                      <input type="hidden" id="txtTipo" name="txtTipo" value="">
                    </div>

                    <a target="_blank" href="<?php echo base_url('portal'); ?>">Acesso de Responsável</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Entrar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
        </div>

      </div>
    </form>
  </div>
</header>