<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Evaluadores</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox.css" />
        <script src="<?php echo base_url(); ?>js/modernizr.js"></script>
        <script src="<?php echo base_url(); ?>js/vendor/jquery.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.fancybox.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.fancybox.pack.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".cambiarEvaluador").fancybox({
                'autoSize' : false,
                'width'     : '30%',
                'height'    : '30%',
                'autoScale'     : false,
                'transitionIn'  : 'none',
                'transitionOut' : 'none',
                afterClose: function () {
                    parent.location.reload(true);
                },
                'type'      : 'iframe'
                });
            });
        </script>
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
              				<th width="210" style="text-align: center"> &Aacute;rea de conocimiento </th>
                            <th width="210" style="text-align: center"> Acci&oacute;n </th>
             			</tr>
             		</thead>
             		<tbody>
             			<?php for($i=0; $i<count($listar3EvaluadoresPropuesta);$i++) { ?>
             			<tr>
             				<td style="text-align: center"> <?php echo utf8_decode($listar3EvaluadoresPropuesta[$i]['nombre']); ?></td>
             				<td style="text-align: center"> <?php echo utf8_decode($listar3EvaluadoresPropuesta[$i]['cedula']); ?> </td>
              				<td style="text-align: center"> <?php echo utf8_decode($listar3EvaluadoresPropuesta[$i]['ciudadNombre']); ?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listar3EvaluadoresPropuesta[$i]['calificacion']); ?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listar3EvaluadoresPropuesta[$i]['nvNombre']);?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listar3EvaluadoresPropuesta[$i]['organizacionNombre']); ?> </td>
                            <td style="text-align: center"> <?php echo utf8_decode($listar3EvaluadoresPropuesta[$i]['areaNombre']); ?> </td>
                            <td style="text-align: center">
                                <a href="<?php echo site_url('evaluador/asignarEvaluador/'.$idPropuesta); ?>">
                                    <img src="<?php echo base_url(); ?>img/iconos/checkEvaluador.png">                                   
                                </a>
                                 <a  class="cambiarEvaluador" href="<?php echo site_url('propuesta/cambiarEvaluador/'.$idEv0.'/'.$idEv1.'/'.$idEv2.'/'.$listar3EvaluadoresPropuesta[$i]['idEvaluador'].'/'.$idPropuesta); ?>">
                                    <img src="<?php echo base_url(''); ?>img/iconos/cambiarEvaluador.png">                                   
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