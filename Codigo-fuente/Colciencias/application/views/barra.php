<?php
  
  $sessionData = $this->session->userdata('logged_in');  
  if($sessionData == 0) {
        echo "<script> window.location.href = '".site_url("login")."'; </script>";
  }
?>

<center><img style="height: 150px" src="<?php echo base_url(); ?>img/logo-colciencias.jpg"></center>
<div class="row">
    
<nav class="top-bar" data-topbar style="background-color: #086A87;">
  <ul class="title-area">
    <li class="name">
      <h1><a href="<?php echo site_url('home'); ?>"><b>Colciencias</b></a></h1>
    </li>
    
  </ul>


  <section class="top-bar-section">
    <ul class="right">
      <li>
        <a href="<?php echo site_url('home/logout') ?>" style="background-color: #086A87;" >Cerrar sesi&oacute;n</a>
      </li>
    </ul>

    
    <ul class="left">
      <li><a href="<?php echo site_url('convocatoria/listarConvocatorias') ?>"style="background-color: #086A87;">Convocatoria</a></li>
      <li><a href="<?php echo site_url('evaluador/listaDeEvaluadores'); ?>"style="background-color: #086A87;"style="background-color: #086A87;">Evaluador</a></li>
      <li><a href="<?php echo site_url('propuesta/listaDePropuestas'); ?>"style="background-color: #086A87;">Propuesta</a></li>
      <li><a href="<?php echo site_url('propuesta/listarConvocatoriasConEvaluaciones'); ?>" style="background-color: #086A87;">Evaluaci&oacute;n</a></li>

    </ul>
  </section>
</nav>
<div style="margin-top: 15px; margin-bottom: -30px;">
  <?php echo set_breadcrumb(); ?>
</div>
  

</div>