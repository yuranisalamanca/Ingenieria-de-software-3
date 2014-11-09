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
        
        </br>
         <br>
        <div class="row" style="">
            <form> 
             <fieldset>
                <legend>Buscar propuesta</legend>
                <div class="row">
                 <div class="large-4 columns"> 
                    <label>Convocatoria:
                        <select id="select_convocatoria"> 
                           <option value="0" selected="selected">Todas</option> 
                           <?php for ($i=0; $i < count($listadoConvocatoriasBusqueda); $i++) { ?>
                                <option value="<?php echo $listadoConvocatoriasBusqueda[$i]['idConvocatoria']; ?>"><?php echo utf8_decode ($listadoConvocatoriasBusqueda[$i]['convocatoriaNombre']); ?></option>
                           <?php } ?>
                        </select>
                     </label> 
                 </div>
                    <div class="large-4 columns">
                         <label>Titulo:
                             <input id="titulo" type="text" placeholder="Ingrese el titulo de la propuesta" />
                         </label> 
                    </div> 
                    <div class="large-4 columns"> 
                        <label>Estado:
                            <select id="select_estado"> 
                                <option value="0" selected="selected">Todos</option>
                                <?php for ($i=0; $i < count($listadoEstadoPropuesta); $i++) { ?>
                                      <option value="<?php echo $listadoEstadoPropuesta[$i]['idEstado']; ?>"><?php echo utf8_decode ($listadoEstadoPropuesta[$i]['nombre']); ?></option>
                                <?php } ?>
                            </select>
                         </label> 
                    </div>
                    <div align="center">
                        <input id="buscar" class="button round" style="font-size: 12px;background-color: #086A87" value="Iniciar B&uacute;squeda">
                    </div>
                </div>
             </fieldset>
            </form>
        </div>
          <div class="row" style="">
            <br>
             <div id="tabla">
             	<table>
             		<thead>
             			<tr> 
                            <th width="210" style="text-align: center"> Convocatoria </th>
             				<th width="210" style="text-align: center"> T&iacute;tulo </th>
             				<th width="210" style="text-align: center"> Estado </th>
             				<th width="210" style="text-align: center"> Organizaci&oacute;n </th> 
             				<th width="210" style="text-align: center"> Instituci&oacute;n </th>
             				<th width="210" style="text-align: center"> &Aacute;rea de conocimiento</th>
                            <th width="210" style="text-align: center"> Tipo de evaluaci&oacute;n </th>
                            <th width="210" style="text-align: center"> Ver </th>
                            <th width="210" style="text-align: center"> Evaluar </th>
              			</tr>
             		</thead>
             		<tbody>
                        <?php if($listadoPropuestas != 'No hay'){ ?>
             			<?php for($i=0; $i<count($listadoPropuestas);$i++) { ?>
             			<tr>
                            <td style="text-align: center"> <?php echo utf8_decode($listadoPropuestas[$i]['nombreConvocatoria']); ?></td>
             				<td style="text-align: center"> <?php echo utf8_decode($listadoPropuestas[$i]['titulo']); ?></td>
             				<td style="text-align: center"> <?php echo utf8_decode($listadoPropuestas[$i]['nombreEstado']); ?> </td>
              				<td style="text-align: center"> <?php echo utf8_decode($listadoPropuestas[$i]['nombreOrganizacion']); ?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listadoPropuestas[$i]['nombreInstitucion']); ?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listadoPropuestas[$i]['areaNombre']);?> </td>
             				<td style="text-align: center"> <?php echo utf8_decode($listadoPropuestas[$i]['tipoEvaluacionNombre']); ?> </td>
                            <td style="text-align: center">
                                <a class="" href="">
                                       <img src="<?php echo base_url(); ?>img/iconos/listarPropuesta.png" title="Descargar (Caso de uso REP06)">
                                </a>
                            </td>
                            <td style="text-align: center">
                                <a class="" href="">
                                       <img src="<?php echo base_url(); ?>img/iconos/checkEvaluador.png" title="Evaluar (Caso de uso EVA37)">
                                </a>
                        </td>
             			</tr>
                        <?php } ?>
                        <?php }else{ ?>
                        <tr>
                            <td colspan='9' style='text-align: center'>
                                No se encontraron propuestas para este evaluador, con los criterios seleccionados
                            </td>
                        </tr>
                        <?php }?>
             		</tbody>
             	</table>

        	</div>
    	
        </div>
        <center><h3 class="subheader">Todos los derechos reservados</h3><center>
        <center><h3 class="subheader">2014</h3><center>
    </body>
    <script type="text/javascript">
    $("#buscar").click(function(){
        var titulo=$("#titulo").val();
        var select_convocatoria=$("#select_convocatoria").val();
        var select_estado=$("#select_estado").val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url().'index.php/evaluador/actualizarListaDePropuestasEvaluador'; ?>",
          data: "titulo="+titulo+"&select_convocatoria="+select_convocatoria+"&select_estado="+select_estado,
          dataType: "html",
          success: function(msg){
            $("#tabla").html(msg);
          }
        });
    });
    
    </script>
</html>