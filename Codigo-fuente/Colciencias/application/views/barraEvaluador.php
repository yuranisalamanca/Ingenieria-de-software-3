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
      <h1><a href="<?php echo site_url('homeEvaluador'); ?>"><b>Colciencias</b></a></h1>
    </li>
    
  </ul>

  <section class="top-bar-section">
    <ul class="right">
      <li>
        <a href="<?php echo site_url('homeEvaluador/logout') ?>" style="background-color: #086A87;" >Cerrar sesion</a>
      </li>
    </ul>

    
    <ul class="left">
      <li><a href="<?php echo site_url('evaluador/listaPropuestasEvaluador') ?>"style="background-color: #086A87;">Mis evaluaciones</a></li>
    </ul>
  </section>
</nav>

  

</div>