<html>
 <head>
   <title>Colciencias</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox.css" />
  <script src="<?php echo base_url(); ?>js/modernizr.js"></script>
 </head>
 <body>

  <center><img style="height: 150px" src="<?php echo base_url(); ?>img/logo-colciencias.jpg"></center>
  <div class="row">
    <nav class="top-bar" data-topbar  style="background-color: #086A87;;">
      <ul class="title-area">
        <li class="name">
         <center> <h1><a href="" style="background-color: #086A87;">Colciencias</a></h1></center>
        </li>
      </ul>
  </div>
  <br>
  <div class="row">
    <div class="small-12 large-8 large-offset-2 columns">
    <fieldset>
    <legend>Ingresar a Colciencias</legend>
     <?php echo validation_errors(); ?>
     <?php echo form_open('verificarLogin'); ?>
        <div>
          <label for="username">Usuario: <small>requerido</small></label>
          <input type="text" size="20" id="username" name="username" pattern="(/w){1,25}$" required/>
        </div>
        <div>
          <label for="password"> Contrase&ntilde;a: <small>requerido</small></label>
          <input type="password" size="20" id="passowrd" name="password"/>
        </div>
        <button align="center" value="Login" type ="submit" style="background-color: #086A87;margin-left: 38%;">Acceder</button>
      </form>
      </fieldset>
    </div>
  </div>
    <script src="js/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation.topbar.js"></script>
    <script src="js/foundation.abide.js"></script>
    <script>
    $(document).foundation();
    </script>
 </body>
</html>