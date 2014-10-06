<<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Convocatorias</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox.css" />
    <script src="<?php echo base_url(); ?>js/modernizr.js"></script>
</head>
<body>
	<br>
	<div class="row">
		<br>
		<label style="text-align:center"> <h3> Convocatorias Colciencias </h3> </label>	
		<br>
		<div>
			<table style="margin:0 auto">
				<thead>
					<tr>
						<th width="210" style="text-align: center"> Nombre</th>
						<th width="210" style="text-align: center"> Tipo </th>
						<th width="210" style="text-align: center"> Estado</th>

					</tr>
				</thead>
				<tbody>
					<?php for ($i=0; $i < count($listadoConvocatorias) ; $i++) { ?>
					<tr>
						<td style="text-align: center"> <?php echo utf8_decode($listadoConvocatorias[$i]['convocatoriaNombre']); ?></td>
	     				<td style="text-align: center"> <?php echo utf8_decode($listadoConvocatorias[$i]['tipoConvocatoria']); ?></td>
	     				<td style="text-align: center"> <?php echo utf8_decode($listadoConvocatorias[$i]['estadoConvocatoria']); ?></td>

					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>	
	</div>

</body>
</html>