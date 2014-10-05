<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Propuestas</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox.css" />
        <script src="<?php echo base_url(); ?>js/modernizr.js"></script>
    </head>
    <body>
        
        </br>
          <div class="row" style="">
         	</br>
            
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
              				<th width="210" style="text-align: center"> Area de conocimiento </th>
                            <th width="210" style="text-align: center"> Acci&oacute;n </th>
             			</tr>
             		</thead>
             		<tbody>
             			<?php for($i=0; $i<count($listarEvaluadores);$i++) { ?>
             			<tr>
             				<td style="text-align: center"> <?php echo utf8_decode($listarEvaluadores[$i]['nombre']); ?></td>
             				<td style="text-align: center"> <?php echo utf8_decode($listarEvaluadores[$i]['cedula']); ?> </td>
              				<td style="text-align: center"> <?php echo utf8_decode($listarEvaluadores[$i]['ciudadNombre']); ?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listarEvaluadores[$i]['calificacion']); ?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listarEvaluadores[$i]['nvNombre']);?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listarEvaluadores[$i]['organizacionNombre']); ?> </td>
                            <td style="text-align: center"> <?php echo utf8_decode($listarEvaluadores[$i]['areaNombre']); ?> </td>
                            <td style="text-align: center"><a class="" href="">
                                    <img src="<?php echo base_url(); ?>img/iconos/listarPropuesta.png">
                                </a>
                            </td>
             			</tr>
                        <?php } ?>
             		</tbody>
             	</table>

        	</div>
    	
        </div>
    </body>
</html>