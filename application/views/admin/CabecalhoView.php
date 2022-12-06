<?php

	if(!isset($_SESSION['login'])){
	
		redirect(base_url("Admin/login"));
		
    }

?>

<header class="app-header navbar">
  <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="nav navbar-nav ml-auto">

    <li class="nav-item" style="margin-right:10px !important;">
      <button class="nav-link navbar-toggler aside-menu-toggler" role="button" aria-haspopup="true"
        aria-expanded="false">
        <i class="icon-bell"></i><span class="badge badge-pill badge-danger" id="total_notificacoes"></span>
      </button>
    </li>
    <li class="nav-item dropdown" style="margin-right:10px !important;">
      <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
        aria-expanded="false">
        <i class="fa fa-user-o"></i>
        <?php 
			
			$nome = explode(' ', $_SESSION['login'][0]->NOME); 
			
			echo mb_strtoupper($nome[0]);
			
		  ?>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <!--<div class="dropdown-header text-center">
            <strong>Account</strong>
          </div>
          <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Updates<span class="badge badge-info">42</span></a>
          <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span class="badge badge-success">42</span></a>
          <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span class="badge badge-danger">42</span></a>
          <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span class="badge badge-warning">42</span></a>
          <div class="dropdown-header text-center">
            <strong>Settings</strong>
          </div>
          <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
          <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
          <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="badge badge-secondary">42</span></a>
          <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Projects<span class="badge badge-primary">42</span></a>
          <div class="divider"></div>
          <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>-->
        <a class="dropdown-item" href="<?php echo base_url("Admin/logout"); ?>"><i class="fa fa-sign-out"></i> Sair</a>
      </div>
    </li>
  </ul>

</header>