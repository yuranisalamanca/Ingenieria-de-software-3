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
             			<?php for($i=0; $i<count($listaPropuesta);$i++) { ?>
             			<tr>
             				<td style="text-align: center"> <?php echo utf8_decode($listaPropuesta[$i]['titulo']); ?></td>
             				<td style="text-align: center"> <?php echo utf8_decode($listaPropuesta[$i]['nombreEstado']); ?> </td>
              				<td style="text-align: center"> <?php echo utf8_decode($listaPropuesta[$i]['nombreOrganizacion']); ?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listaPropuesta[$i]['nombreInstitucion']); ?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listaPropuesta[$i]['areaNombre']);?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listaPropuesta[$i]['tipoEvaluacionNombre']); ?> </td>
                            <td style="text-align: center">
                            <?php if($listaPropuesta[$i]['evaluadoresEncontrados']===true){ ?>
                                 <a class="cambiarEvaluador" href="<?php echo site_url('evaluador/listar3EvaluadoresPorPropuesta/'.$listaPropuesta[$i]['idPropuesta']); ?>">
                                    <img src="<?php echo base_url(); ?>img/iconos/verInfoEvaluadores.png">                                 
                                </a>
                            <?php } else { ?>
                                  <a class="buscarEvaluadores" href="<?php echo site_url('propuesta/buscarEvaluadores/'.$listaPropuesta[$i]['idPropuesta']); ?>">
                                    <img src="<?php echo base_url(); ?>img/iconos/search.png">
                                </a>
                            <?php } ?>
                            </td>
             			</tr>
                        <?php } ?>
             		</tbody>
             	</table>

        	</div>
    	
        </div>
    </body>
</html>