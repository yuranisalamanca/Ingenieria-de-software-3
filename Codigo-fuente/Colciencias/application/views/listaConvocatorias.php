<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Convocatorias</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox.css" />
    <script src="<?php echo base_url(); ?>js/modernizr.js"></script>
</head>
<body bgcolor="red">
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
						<th width="210" style="text-align: center"> Acci&oacute;n</th>

					</tr>
				</thead>
				<tbody>
					<?php for ($i=0; $i < count($listadoConvocatorias) ; $i++) { ?>
					<tr>
						<td style="text-align: center"> <?php echo utf8_decode($listadoConvocatorias[$i]['convocatoriaNombre']); ?></td>
	     				<td style="text-align: center"> <?php echo utf8_decode($listadoConvocatorias[$i]['tipoConvocatoria']); ?></td>
	     				<td style="text-align: center"> <?php echo utf8_decode($listadoConvocatorias[$i]['estadoConvocatoria']); ?></td>
	     				<td style="text-align: center">
	     					 <a class="" href="<?php echo site_url('propuesta/listaDePropuestasPorConvocatoria/'.$listadoConvocatorias[$i]['idConvocatoria']); ?>">
                                    <span data-tooltip aria-haspopup="true" class="has-tip" data-options="show_on:large" title="Ver propuestas">
                                    <img src="<?php echo base_url(); ?>img/iconos/listarPropuesta.png">
                                	</span>
                             </a>
                        </td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>	
	</div>
	<br>
	<center><h3 class="subheader">Todos los derechos reservados</h3><center>
    <center><h3 class="subheader">2014</h3><center>
</body>
</html>