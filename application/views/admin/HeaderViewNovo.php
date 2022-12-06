<header class="c-header c-header-light bg-light c-header-fixed c-header-with-subheader">
			
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><i class="fa fa-bars"></i></button>

    <a class="c-header-brand d-lg-none" href="#">3Clicks Sistemas</a>

    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true" title="Ocultar / mostrar menu">
        <i class="fa fa-bars fa-fw"></i>
    </button>

    <ul class="c-header-nav mfs-auto bg-dark" style="padding-right:10px;">
        <li class="c-header-nav-item d-none d-sm-block" style="margin-right:10px;">
            <a class="c-header-nav-link btn-dark text-white" style="padding:21px;" id="btnFullscreen" href="javascript:void(0);" title="Tela cheia">
                <i class="fa fa-desktop"></i>
            </a>
        </li>
        <li class="c-header-nav-item d-block d-sm-none">
            <a href="#" class="c-header-nav-link rounded-circle btn-primary text-white" style="padding:14px 14px; margin-right:5px;" data-toggle="modal" data-target="#modal_empresa" role="button">
                <i class="fa fa-industry"></i>
            </a>
        </li>
        <li class="c-header-nav-item d-none d-sm-block">
            <a href="#" class="c-header-nav-link btn-dark text-white" style="padding:7px;" data-toggle="modal" data-target="#modal_empresa" role="button">
                <div class="media">
                    <i class="fa fa-industry mr-3 align-self-center"></i>
                    <div class="media-body">
                        <?php 
                            if(isset($_SESSION['login_empresas'])){

                                foreach($_SESSION['login_empresas'] as $val){
                                    if($val->idempresa == $_SESSION['login']->idempresa){
                                        echo "<strong>" . $val->nomeempresa . "</strong><br/><span style='font-size:11px;'>" . $val->cnpj . "</span>";
                                        break;
                                    }
                                }

                            }

                        ?>
                    </div>
                </div>
                
            </a>
        </li>
        <li class="c-header-nav-item dropdown d-block d-sm-none">
            <a class="c-header-nav-link rounded-circle bg-info text-white" style="padding:10px 16px; margin-right:-10px;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <?php 
                    echo substr($_SESSION['login']->nome, 0, 1);
                ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-item"><?php echo $_SESSION['login']->nome; ?></div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url("Usuario/logout"); ?>">
                    <i class="fa fa-sign-out"></i> Sair
                </a>
            </div>
        </li>
        <li class="c-header-nav-item dropdown d-none d-sm-block">
            <a class="c-header-nav-link btn-dark text-white" style="padding:9px;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="c-avatar">
                    <i class="fa fa-user"></i>
                    <!--<img class="c-avatar-img" src="assets/img/avatars/6.jpg" alt="user@email.com">-->
                </div>
                <?php 
			
			$nome = explode(' ', $_SESSION['login'][0]->nome); 
			
			echo mb_strtoupper($nome[0]);
			
		  ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <!--
            <div class="dropdown-header bg-light py-2"><strong>Account</strong></div><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bell"></use>
                </svg> Updates<span class="badge badge-info ml-auto">42</span></a><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-envelope-open"></use>
                </svg> Messages<span class="badge badge-success ml-auto">42</span></a><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-task"></use>
                </svg> Tasks<span class="badge badge-danger ml-auto">42</span></a><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-comment-square"></use>
                </svg> Comments<span class="badge badge-warning ml-auto">42</span></a>
            <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-user"></use>
                </svg> Profile</a><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-settings"></use>
                </svg> Settings</a><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-credit-card"></use>
                </svg> Payments<span class="badge badge-secondary ml-auto">42</span></a><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-file"></use>
                </svg> Projects<span class="badge badge-primary ml-auto">42</span></a>
                        -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url("Usuario/logout"); ?>">
                    <i class="fa fa-sign-out"></i> Sair
                </a>
            </div>
        </li>
    </ul>

</header>

<script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
<script>

    function toggleFullScreen() {
    if (!document.fullscreenElement &&    // alternative standard method
        !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
        if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen();
        } else if (document.documentElement.msRequestFullscreen) {
        document.documentElement.msRequestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
        document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.exitFullscreen) {
        document.exitFullscreen();
        } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
        }
    }
    }

    $(function(){

        <?php if($_SESSION['login']->idempresa == ""){ ?>

            $("#modal_empresa").modal("show");

        <?php } ?>

        $('#btnFullscreen').click(function(){
            toggleFullScreen();
        });

    });

</script>