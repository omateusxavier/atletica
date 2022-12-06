 <div class="sidebar">
   <nav class="sidebar-nav">
     <ul class="nav">
       <li class="nav-item">
         <a class="nav-link nav-link-success" href="<?php echo base_url("Admin"); ?>"><i class="icon-home"></i> Home</a>
       </li>

       <li class="nav-item">
          <a class="nav-link " href="<?php echo base_url("Atletas"); ?>"><i class="icon-user"></i>Atletas</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url("Candidatos"); ?>"><i class="icon-user"></i>
            Candidatos</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url("Equipes"); ?>"><i class="fa fa-users" aria-hidden="true"></i>
            Equipes</a>
        </li>

       <li class='nav-item nav-dropdown'>
          <a class='nav-link nav-dropdown-toggle' href='#'><i class="fa fa-cog" aria-hidden="true"></i> Gestão</a>
          <ul class='nav-dropdown-items'>
            <li class='nav-item'>
              <a class='nav-link' href='<?php echo base_url("Posicoes"); ?>' title='' style='padding:8px 15px;'><i class="fa fa-bars" aria-hidden="true"></i>Posições</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="<?php echo base_url("Modalidades"); ?>" style='padding:8px 15px;'><i class="fa fa-bars" aria-hidden="true"></i>
                Modalidades</a>
            </li>
                    
          </ul>
       </li>

     </ul>
   </nav>
   <button class="sidebar-minimizer brand-minimizer" type="button" title="Minimizar / Maximar Menu"></button>
 </div>

 <style>
#box_notificacoes .list-group a {
  -webkit-transition: padding 0.2s;
  transition: padding 0.2s;
}

#box_notificacoes .list-group a:hover {
  padding-left: 5px !important;
}
 </style>


 <aside class="aside-menu" id="box_notificacoes" style="overflow:auto; background-color:#F8F6F6;">

   <div class="row">

     <div class="col-md-4 col-4">

       <div class="btn-group" role="group">
         <button type="button" class="btn btn-link" title="Atualizar" id="btnAtualizarNotificacoes"><i
             class="fa fa-refresh"></i></button>
         <button type="button" class="btn btn-link" title="Limpar tudo"><i class="fa fa-trash"></i></button>
       </div>

     </div>

     <div class="col-md-8 col-8 text-primary" id="carregando_notificacoes" style="display:none; padding-top:7px;">

       <i class="fa fa-circle-o-notch fa-spin" style="font-size:20px;"></i>
       <span class="sr-only">Loading...</span>
       <span style="font-size:12px;">Atualizando...</span>

     </div>

   </div>

   <div class="row">

     <div class="col-md-12">

       <ul class="list-group">



       </ul>

     </div>

   </div>

 </aside>

 <script>
$(function() {

  atualizar_notificacoes();

  $('#btnAtualizarNotificacoes').click(function() {
    atualizar_notificacoes();
  });

  $(document).on('click', '.item_notificacao', function() {

    var id_notificacao = $(this).attr('data-idnotificacao');
    var status = $(this).attr('data-statusnotif');

    if (status == 1) {

      $.get("<?php echo base_url("Admin/notificacao_vista"); ?>/" + id_notificacao, function(result) {

        atualizar_notificacoes();

      });

    }

  });

});


function atualizar_notificacoes() {

  $('#carregando_notificacoes').fadeIn('fast');

  $('#box_notificacoes .list-group').load("<?php echo base_url("Admin/notificacoes_frame"); ?>", function() {

    $('#carregando_notificacoes').fadeOut('fast');

  });

}
 </script>