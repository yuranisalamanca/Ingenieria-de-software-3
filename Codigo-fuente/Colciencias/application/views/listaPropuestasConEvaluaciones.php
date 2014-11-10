<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Propuestas</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox.css" />
        <script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
        <script src="<?php echo base_url(); ?>js/vendor/jquery.js"></script>
    </head>
    <body>   
             <div id="tabla" >
            <br>
            <br>
            <div class="row" style="">
             	<table style="margin:0 auto">
             		<thead>
             			<tr> 
                            <th width="210" style="text-align: center"> Titulo </th>
             				<th width="210" style="text-align: center"> Proponente </th>
             				<th width="210" style="text-align: center"> Instituci&oacute;n </th>
             				<th width="210" style="text-align: center"> Calificaci&oacute;n Final </th> 
             				<th width="210" style="text-align: center"> Ver evaluaci&oacute;n </th>
              			</tr>
             		</thead>
             		<tbody>
                        <?php if($listaPropuestas!='no hay'){ ?>
             			<?php for($i=0; $i<count($listaPropuestas);$i++) { ?>
             			<tr>
                            <td style="text-align: center"> <?php echo utf8_decode($listaPropuestas[$i]['titulo']); ?></td>
             				<td style="text-align: center"> <?php echo utf8_decode($listaPropuestas[$i]['proponente']);?></td>
             				<td style="text-align: center"> <?php echo utf8_decode($listaPropuestas[$i]['institucion']); ?></td>
              				<td style="text-align: center"> <?php echo utf8_decode($listaPropuestas[$i]['calificacion']); ?></td>
                            <td style="text-align: center">
                                <a class="" href="">
                                       <img src="<?php echo base_url(); ?>img/iconos/listarPropuesta.png" title="Ver evaluacion">
                                </a>
                            </td>
             			</tr>
                        <?php }?>
                        <?php }else{ ?>
                        <tr>
                            <td colspan='5' style="text-align: center">
                                No se encontraron propuestas para la convocatoria seleccionada
                            </td>
                        </tr>
                        <?php } ?>
             		</tbody>
             	</table>
             </div>
        	</div>
        </div>
        <center><h3 class="subheader">Todos los derechos reservados</h3><center>
        <center><h3 class="subheader">2014</h3><center>
    </body>
    
</html>