<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox.css" />
    <script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/jquery.js"></script>	
</head>
<body>
	<div class="row">
		<br>
		<form method="post" action="<?php echo site_url('propuesta/cambiarEvaluador/'.$idEv0.'/'.$idEv1.'/'.$idEv2.'/'.$idCambiado.'/'.$idPropuesta); ?>">
			<input type="hidden" name="select" value="1">
			<select name="select_evaluador">
			<option value="0" selected="selected" disabled="disabled">Seleccione...</option>
			<?php for ($i=0; $i < count($listarEvaluadoresTodos); $i++) { ?>
				<option value="<?php echo $listarEvaluadoresTodos[$i]['idEvaluador']; ?>"><?php echo $listarEvaluadoresTodos[$i]['nombre']; ?></option>
			<?php } ?>
			</select>
			<br>
			<input type="submit" id="send" class="button" style="margin-left: 30%" value="Seleccionar">
		</form>
	</div>
</body>
<script type="text/javascript">
$("#send").click(function() {
	parent.$.fancybox.close();
});
</script>
</html>
 


   