<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show c-sidebar-minimized" id="sidebar">
	  
    <div class="c-sidebar-brand d-lg-down-none">
        <span class="c-sidebar-brand-full">
            FJAU
        </span>
        <span class="c-sidebar-brand-minimized">
            FJAU
        </span>
    </div>
    
    <ul class="c-sidebar-nav">
        
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link c-sidebar-nav-link-success" href="<?php echo base_url("Home"); ?>"><i class="c-sidebar-nav-icon fa fa-home"></i> Home</a></li>

        <?php

				$menu = array();
				$menu_exibir = array();
				
				if(isset($_SESSION['login_menu'])){
					
					$menu = $_SESSION['login_menu'];
					$acoes_usuario = explode(';', $_SESSION['login'][0]->acoes);
					
					if(count($menu) > 0 and count($acoes_usuario) > 0){
						
						$modulos = array();
						
						foreach($menu as $m){
							if(in_array($m->id_acao, $acoes_usuario)){
								$modulos[] = $m->id_modulo;
							}
						}
						
						$modulos = array_unique($modulos);
						
						
						foreach($modulos as $mod){
							
							foreach($menu as $val){
								
								if($val->id_modulo == $mod){
									
									$itens_modulo = array();
									
									foreach($menu as $m2){
										
										if($m2->id_modulo == $mod and in_array($m2->id_acao, $acoes_usuario)){
											$itens_modulo[] = $m2;
										}
										
									}
									
									$menu_exibir[] = array('id_modulo' => $mod, 
														   'descricao_modulo' => $val->descricao_modulo,
														   'icone_modulo' => $val->icone_modulo,
														   'itens_modulo' => $itens_modulo);
								
									break;
									
								}
								
							}
							
						}
						
						
					}
					
				}
				
				if(count($menu_exibir) > 0){
					
					foreach($menu_exibir as $val){ ?>
						
                        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                            <a class="c-sidebar-nav-dropdown-toggle" href="javascript:void(0);">
                                 
                                <i class="c-sidebar-nav-icon fa fa-hashtag"></i> <?php echo $val['descricao_modulo']; ?>
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
					<?php foreach($val['itens_modulo'] as $m){
							
							echo "<li class='c-sidebar-nav-item'>
									<a class='c-sidebar-nav-link' href='" . base_url($m->url) . "' title='" . $m->descricao . "'>" . $m->titulo . "</a>
								  </li>";
							
						}
						
						echo "</ul>
							  </li>";
	
					}
	
				}

			?>
    </ul>
    
    <button class="c-sidebar-minimizer c-class-toggler" id="btnMinimizarMenu" type="button" data-target="_parent" data-class="c-sidebar-minimized" title="Maximizar / minimizar menu"></button>

</div>
<!-- c-sidebar -->