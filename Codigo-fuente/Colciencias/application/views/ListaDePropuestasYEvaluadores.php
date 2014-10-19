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
<body>
	<br>
	<div class="row">
		<br>
		 <?php if($evaluadoresYPropuestasEncontrados == true) {?>
		<label style="text-align: center"><h3> Lista de evaluadores y propuestas de la convocatoria:<br><em><?php echo utf8_decode($nombreConvocatoria); ?> </em></h3></label>	
		<?php } else { ?>
            <div data-alert class="alert-box warning radius" id="alerta">
                    La convocatoria <strong><?php echo utf8_decode($nombreConvocatoria); ?></strong> no tiene propuestas y evaluadores confirmados.
                <a href="#" class="close" data-dismiss="alert" id="closeAlerta">&times;</a>
            </div>
            <?php } ?>
		<br>
		<div>
			<table style="margin:0 auto">
				<thead>
					<tr>
						<th width="210" style="text-align: center"> N&uacute;mero</th>
						<th width="210" style="text-align: center"> Nombre de la propuesta 
						<?php if($ordenarPropuesta==1){ ?>
							<a href="<?php echo site_url('evaluador/listaDePropuestasYEvaluadoresOrdenado/'.$idConvocatoria.'/0/2');?>">
								<img src="<?php echo base_url();?>img/iconos/arriba.png">
							</a>
						<?php } else if($ordenarPropuesta==2){?>
							<a href="<?php echo site_url('evaluador/listaDePropuestasYEvaluadoresOrdenado/'.$idConvocatoria.'/0/1');?>">
								<img src="<?php echo base_url();?>img/iconos/abajo.png">
							</a>
						<?php }else{ ?>
							<a href="<?php echo site_url('evaluador/listaDePropuestasYEvaluadoresOrdenado/'.$idConvocatoria.'/0/1');?>">
								<img src="<?php echo base_url();?>img/iconos/arribaAbajo.png">
							</a>
						<?php } ?>
						 </th>
						<th width="210" style="text-align: center"> Evaluador
						<?php if($ordenarEvaluador==1){ ?>
							<a href="<?php echo site_url('evaluador/listaDePropuestasYEvaluadoresOrdenado/'.$idConvocatoria.'/2/0');?>">
								<img src="<?php echo base_url();?>img/iconos/arriba.png">
							</a>
						<?php } else if($ordenarEvaluador==2){?>
							<a href="<?php echo site_url('evaluador/listaDePropuestasYEvaluadoresOrdenado/'.$idConvocatoria.'/1/0');?>">
								<img src="<?php echo base_url();?>img/iconos/abajo.png">
							</a>
						<?php }else{ ?>
							<a href="<?php echo site_url('evaluador/listaDePropuestasYEvaluadoresOrdenado/'.$idConvocatoria.'/1/0');?>">
								<img src="<?php echo base_url();?>img/iconos/arribaAbajo.png">
							</a>
						<?php } ?>
						</th>
						<th width="210" style="text-align: center"> Iniciar proceso de evaluaci&oacute;n</th>
						<th width="210" style="text-align: center"> Acci&oacute;n</th>

					</tr>
				</thead>
				<tbody>
					<?php for ($i=0; $i < count($listaPropuestasYEvaluadores); $i++) { ?>
					<tr>
						<td style="text-align: center"> <?php echo utf8_decode($listaPropuestasYEvaluadores[$i]['idPropuesta']); ?></td>
	     				<td style="text-align: center"> <?php echo utf8_decode($listaPropuestasYEvaluadores[$i]['nombrePropuesta']); ?></td>
	     				<td style="text-align: center"> <?php echo utf8_decode($listaPropuestasYEvaluadores[$i]['nombreEvaluador']); ?></td>
	     				<td style="text-align: center">
	     				<?php if($listaPropuestasYEvaluadores[$i]['iniciarProceso']==0){?>
	     					 <a class="" href="<?php echo site_url('evaluador/iniciarProcesoDeEvaluacion/'.$listaPropuestasYEvaluadores[$i]['idPropuesta'].'/'.$listaPropuestasYEvaluadores[$i]['idEvaluador']);?>">
                                    <img src="<?php echo base_url(); ?>img/iconos/iniciarProcesoDeEvaluacion.png" title="Iniciar proceso de evaluaci&oacute;n">
                             </a>
                        <?php }else{?>
                                    <img src="<?php echo base_url(); ?>img/iconos/procesoIniciado.png">
                        <?php } ?>                                         
                        </td>
                        <td style="text-align: center">
                        	<a class="" href="<?php echo site_url('evaluador/verEvaluador/'.$listaPropuestasYEvaluadores[$i]['idEvaluador']);?>">
                                   <img src="<?php echo base_url(); ?>img/iconos/verInfoEvaluadores.png" title="Informaci&oacute;n Evaluador">
                            </a>
                            <a class="" href="<?php echo site_url('propuesta/verPropuesta/'.$listaPropuestasYEvaluadores[$i]['idPropuesta']);?>">
                                   <img src="<?php echo base_url(); ?>img/iconos/infoPropuesta.png" title="Informaci&oacute;n propuesta">
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
 <script type="text/javascript">
   $('#closeAlerta').click(
            function (){
            $('#alerta').hide(1000);
    });   
  </script>
</html>