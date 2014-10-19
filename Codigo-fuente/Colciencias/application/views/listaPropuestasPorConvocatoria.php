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
        <?php if($this->session->userdata('varError')!=''){ ?>
          <div id="varError" style="margin-top: 10px; width: 74%; margin-left: 13%" class="alert-box warning radius" > &nbsp;<?php echo $this->session->userdata('varError'); ?><a href="#" class="close" data-dismiss="alert" id="closeVarError">&times;</a></div>
        <?php $this->session->unset_userdata('varError'); } ?>

        <?php if($this->session->userdata('varSeleccion')!=''){ ?>
          <div id="varSeleccion" style="margin-top: 10px; width: 74%; margin-left: 13%" class="alert-box warning radius" > &nbsp;<?php echo $this->session->userdata('varSeleccion'); ?><a href="#" class="close" data-dismiss="alert" id="closeVarSeleccion">&times;</a></div>
        <?php $this->session->unset_userdata('varSeleccion'); } ?>

        <?php if($this->session->userdata('varNada')!=''){ ?>
          <div id="varNada" style="margin-top: 10px; width: 74%; margin-left: 13%" class="alert-box warning radius" > &nbsp;<?php echo $this->session->userdata('varNada'); ?><a href="#" class="close" data-dismiss="alert" id="closeVarNada">&times;</a></div>
        <?php $this->session->unset_userdata('varNada'); } ?>

          <div class="row" style="">
         	</br>
            
            <?php if($propuestasEncontradas == true) {?>
                <label style="text-align: center"><h3> Propuestas de la convocatoria:<br><em><?php echo utf8_decode($nombreConv); ?> </em></h3></label>
            <?php } else { ?>
            <div data-alert class="alert-box warning radius" id="alerta">
                    La convocatoria <strong><?php echo utf8_decode($nombreConv); ?></strong> no tiene propuestas.
                <a href="#" class="close" data-dismiss="alert" id="closeAlerta">&times;</a>
            </div>

            <?php } ?>
            <br>
             <div>
             <label style="text-align: right" >Listado de propuestas y evaluadores confirmados:                 
                <a href="<?php echo site_url('evaluador/listaDePropuestasYEvaluadoresOrdenado/'.$idConvocatoria); ?>" >
                     <img src="<?php echo base_url(); ?>img/iconos/propuestasYEvaluadores.png">
                </a>
                |
                Evaluadores pendientes de confirmacion:
                <a href="<?php echo site_url('evaluador/listaDeEvaluadoresPorConvocatoria/'.$idConvocatoria); ?>" >
                     <img src="<?php echo base_url(); ?>img/iconos/listaEvaluadores.png">
                </a>
             </label>
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
                            <?php if($listaPropuesta[$i]['evaluadoresEncontrados']==true){ ?>
                                 <a class="cambiarEvaluador" href="<?php echo site_url('evaluador/listar3EvaluadoresPorPropuesta/'.$listaPropuesta[$i]['idPropuesta']); ?>">
                                    <img src="<?php echo base_url(); ?>img/iconos/verInfoEvaluadores.png" title="Informaci&oacute;n evaluadores">                                 
                                </a>
                            <?php } else { ?>
                                  <a class="buscarEvaluadores" href="<?php echo site_url('propuesta/buscarEvaluadores/'.$listaPropuesta[$i]['idPropuesta']); ?>">
                                    <img src="<?php echo base_url(); ?>img/iconos/search.png" title="Seleccionar evaluadores">
                                </a>
                            <?php } ?>
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
    <script type="text/javascript">
    $('#closeVarError').click(
        function (){
        $('#varError').hide(1000);
    });

     $('#closeAlerta').click(
            function (){
            $('#alerta').hide(1000);
    });

    $('#closeVarSeleccion').click(
            function (){
            $('#varSeleccion').hide(1000);
    });

    $('#closeVarNada').click(
            function (){
            $('#varNada').hide(1000);
    });
    
    </script>
</html>