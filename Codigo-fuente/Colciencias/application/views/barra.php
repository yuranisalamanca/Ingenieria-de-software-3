<center><img style="height: 150px" src="<?php echo base_url(); ?>img/logo-colciencias.jpg"></center>
<div class="row">
    
<nav class="top-bar" data-topbar style="background-color: #086A87;">
  <ul class="title-area">
    <li class="name">
      <h1><a href="<?php echo site_url('propuesta'); ?>"><b>Colciencias</b></a></h1>
    </li>
    
  </ul>

  <section class="top-bar-section">
    <ul class="right">
      <li class="has-dropdown">
        <a href="#" style="background-color: #086A87;" >Registro</a>
        <ul class="dropdown">
          <li ><a href="ingresarUsuario.php" style="background-color: #086A87;">Crear una cuenta</a></li>
          <li ><a href="login.php" style="background-color:#086A87 ;">Iniciar sesion</a></li>
        </ul>
      </li>
    </ul>

    
    <ul class="left">
      <li><a href="<?php echo site_url('convocatoria/listarConvocatorias') ?>"style="background-color: #086A87;">Convocatoria</a></li>
      <li><a href="<?php echo site_url('evaluador/listaDeEvaluadores'); ?>"style="background-color: #086A87;"style="background-color: #086A87;">Evaluador</a></li>
      <li><a href="<?php echo site_url('propuesta/listaDePropuestas'); ?>"style="background-color: #086A87;">Propuesta</a></li>
      <li><a href="#"style="background-color: #086A87;">Panel</a></li>

    </ul>
  </section>
</nav>

</div>