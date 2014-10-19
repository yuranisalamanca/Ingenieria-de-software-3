<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Evaluadores</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox.css" />
        <script src="<?php echo base_url(); ?>js/modernizr.js"></script>
    </head>
    <body>
        
        </br>
          <div class="row" style="">
         	</br>
            <label style="text-align: center"><h3> Evaluadores Colciencias</h3></label>
            <br>
             <div>
             	<table>
             		<thead>
             			<tr> 
             				<th width="210" style="text-align: center"> Nombre</th>
             				<th width="210" style="text-align: center"> Cedula </th>
             				<th width="210" style="text-align: center"> Ciudad </th> 
             				<th width="210" style="text-align: center"> Calificaci&oacute;n </th>
             				<th width="210" style="text-align: center"> Nivel de formaci&oacute;n </th>
                            <th width="210" style="text-align: center"> Organizaci&oacute;n </th>
              				<th width="210" style="text-align: center"> &Aacute;rea de conocimiento </th>
                            <th width="210" style="text-align: center"> Acci&oacute;n </th>
             			</tr>
             		</thead>
             		<tbody>
             			<?php for($i=0; $i<count($infoEvaluador);$i++) { ?>
             			<tr>
             				<td style="text-align: center"> <?php echo utf8_decode($infoEvaluador[$i]['nombre']); ?></td>
             				<td style="text-align: center"> <?php echo utf8_decode($infoEvaluador[$i]['cedula']); ?> </td>
              				<td style="text-align: center"> <?php echo utf8_decode($infoEvaluador[$i]['ciudadNombre']); ?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($infoEvaluador[$i]['calificacion']); ?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($infoEvaluador[$i]['nvNombre']);?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($infoEvaluador[$i]['organizacionNombre']); ?> </td>
                            <td style="text-align: center"> <?php echo utf8_decode($infoEvaluador[$i]['areaNombre']); ?> </td>
                            <td style="text-align: center"><a class="" href="<?php echo site_url(); ?>">
                                    <img src="<?php echo base_url(); ?>img/iconos/back.png">
                                </a>
                            </td>
             			</tr>
                        <?php } ?>
             		</tbody>
             	</table>

        	</div>
    	
        </div>
        <center><h3 class="subheader">Todos los derechos reservados</h3><center>
        <center><h3 class="subheader">2014</h3><center>
    </body>
</html>