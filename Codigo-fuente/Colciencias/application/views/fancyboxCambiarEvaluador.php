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

	    <label style="text-align: center; margin-top:25%"><h4>Seleccione el nuevo evaluador</h4></label>
		<br>
		<form method="post" action="<?php echo site_url('propuesta/listar3EvaluadoresPorPropuestaCambiado/'.$idPropuesta.'/'.$idCambiado); ?>">
			<input type="hidden" name="select" value="1">
			<select name="select_evaluador" style="margin-top: 8%">
			<option value="0" selected="selected" disabled="disabled">Seleccione...</option>
			<?php for ($i=0; $i < count($evaluadoresNuevos); $i++) { ?>
				<option value="<?php echo $evaluadoresNuevos[$i]['idEvaluador']; ?>">
					<?php echo $evaluadoresNuevos[$i]['nombre']; ?>
				</option>
			<?php } ?>
			</select>
			<br>
			<input type="submit" id="send" class="button" style="margin-left: 37%" value="Seleccionar">
		</form>
	</div>
</body>
<script type="text/javascript">
	$("#send").click(function() {
		parent.$.fancybox.close();
	});
</script>
</html>
 


   