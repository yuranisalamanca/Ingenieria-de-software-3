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
        <script src="<?php echo base_url(); ?>js/jquery.fancybox.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.fancybox.pack.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".buscarEvaluadores").fancybox({
                'width'     : '50%',
                'height'    : '50%',
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
            <label style="text-align: center"><h3> Listado de propuestas por evaluador</h3></label>
            <br>
             <div>
             	<table>
             		<thead>
             			<tr> 
             				<th width="210" style="text-align: center"> T&iacute;tulo </th>
             				<th width="210" style="text-align: center"> Estado </th>
             				<th width="210" style="text-align: center"> Organizaci&oacute;n </th> 
             				<th width="210" style="text-align: center"> Instituci&oacute;n </th>
             				<th width="210" style="text-align: center"> &Aacute;rea de conocimiento</th>
                            <th width="210" style="text-align: center"> Tipo de evaluaci&oacute;n </th>
              				<th width="210" style="text-align: center"> Acci&oacute;n </th>

             			</tr>
             		</thead>
             		<tbody>
             			<?php for($i=0; $i<count($listarPropuestasEvaluador);$i++) { ?>
             			<tr>
             				<td style="text-align: center"> <?php echo utf8_decode($listarPropuestasEvaluador[$i]['titulo']); ?></td>
             				<td style="text-align: center"> <?php echo utf8_decode($listarPropuestasEvaluador[$i]['nombreEstado']); ?> </td>
              				<td style="text-align: center"> <?php echo utf8_decode($listarPropuestasEvaluador[$i]['nombreOrganizacion']); ?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listarPropuestasEvaluador[$i]['nombreInstitucion']); ?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listarPropuestasEvaluador[$i]['areaNombre']);?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listarPropuestasEvaluador[$i]['tipoEvaluacionNombre']); ?> </td>
                            <td style="text-align: center">
                                 <a href="">
                                    <img src="<?php echo base_url(''); ?>img/iconos/back.png">                                 
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