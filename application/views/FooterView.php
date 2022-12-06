
<footer class="footer-v1">
  <div class="menuFooter clearfix">
    <div class="container">
      <div class="row clearfix">

        <div class="col-sm-3 col-xs-6">
          <ul class="menuLink">
            <li><h5>Navegação</h5></li>
            <li><a href="<?php echo base_url('Home'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('Colegio'); ?>">Colégio</a></li>
            <li><a href="<?php echo base_url('Integradas'); ?>">Integradas</a></li>
            <li><a target="_blank" href="https://webmail-seguro.com.br/fundacaojau.edu.br/v2/">Email Colaborador</a></li>
            <li><a target="_blank" href="<?php echo base_url('colegio/Ouvidoria/2'); ?>">Ouvidoria</a></li>
           
            
          </ul>
        </div><!-- col-sm-3 col-xs-6 -->

        <div class="col-sm-3 col-xs-6 borderLeft">
          <ul class="menuLink">
            <li><h5>Portais</h5></li>
            <li><a href="http://portal.fundacaojau.edu.br:8077/sif/aluno">Portal do Aluno</a></li>
            <li><a href="http://portal.fundacaojau.edu.br:8077/sif/professor">Portal do Professor</a></li>
            <li><a target="_blank" href="http://portal.fundacaojau.edu.br:8077/sif/UtilRM/portal_colaborador">Portal do Colaborador</a></li>
          </ul>
        </div><!-- col-sm-3 col-xs-6 -->

        <div class="col-sm-3 col-xs-6 borderLeft">
          <div class="footer-address">
            <h5>Endereço:</h5>
            <address>
              Fundação Educacional Dr. Raul Baub<br>
              Rua Tenente Navarro, 642<br>
              CEP: 17207-310<br>
              Jaú-SP
            </address>
            <a href="https://goo.gl/maps/1sK8vrBXU3p" target="_blank"><span class="place"><i class="fa fa-map-marker"></i>Onde Estamos</span></a>
          </div>
        </div><!-- col-sm-3 col-xs-6 -->

        <div class="col-sm-3 col-xs-6 borderLeft">
          <div class="socialArea">
            <h5>Encontre-nos:</h5>
            <ul class="list-inline ">
           
            <li><a target="_blank" href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a></li>
            <li><a target="_blank" href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a></li>
            <li><a target="_blank" href="<?php echo $youtube; ?>"><i class="fa fa-youtube-play"></i></a></li>
            
            </ul>
          </div><!-- social -->
          <div class="contactNo">
            <h5>Fale Conosco:</h5>
            <?php if($numerofilial == 2){
                echo    
                        "<h4>(14) 2104-3450 (Secretaria)</h4>".
                        "<h4>(14) 2104-3490 (CEI)</h4>".
                        "<h4>(14) 2104-3470 (Fund I)</h4>".
                        "<h4>(14) 2104-3480 (Fund II)</h4>".
                        "<h4>(14) 2104-3440 (Ens. Médio)</h4>".
                        "<h4>(14) 2104-3330 (APM)</h4>";;
            } else {
                echo    
                        "<h4>(14) 2104-3400 (Secretaria FIJ)</h4>".
                        "<h4>(14) 2104-3410 (Coordenadores de Cursos)</h4>".
                        "<h4>(14) 2104-3428 (Clínica de Psicologia)</h4>".
                        "<h4>(14) 2104-3421 (E.A.J - Atendimento)</h4>";
            } ?> 
            
            
            
          </div><!-- contactNo -->
        </div><!-- col-sm-3 col-xs-6 -->

      </div><!-- row -->
    </div><!-- container -->
  </div><!-- menuFooter -->

  <div class="footer clearfix">
    <div class="container">
      <div class="row clearfix">
        <div class="col-sm-6 col-xs-12 copyRight">
          <p>© 2019 Fundação Educacional Dr Raul Bauab - Departamento de TI</p>
        </div><!-- col-sm-6 col-xs-12 -->
        <div class="col-sm-6 col-xs-12 privacy_policy">
          <a href="<?php echo base_url('Home'); ?>">Home</a>
          <a href="<?php echo base_url('Colegio'); ?>">Colégio</a>
          <a href="<?php echo base_url('Integradas'); ?>">Integradas</a>
          
        </div><!-- col-sm-6 col-xs-12 -->
      </div><!-- row clearfix -->
    </div><!-- container -->
  </div><!-- footer -->
</footer>


