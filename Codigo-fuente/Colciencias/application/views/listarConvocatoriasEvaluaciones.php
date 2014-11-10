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
                <legend>Buscar convocatoria</legend>
                <div class="row" >
                 <div class="large-4 columns"> 
                    <label>A&ntilde;o:
                        <select id="select_anio"> 
                           <option value="0" selected="selected">Todas</option> 
                           <?php for ($i=0; $i < count($listaAnios); $i++) { ?>
                                <option value="<?php echo $listaAnios[$i]['anioCreacion']; ?>">
                                    <?php echo utf8_decode ($listaAnios[$i]['anioCreacion']); ?>
                                </option>
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
             	<table style="margin:0 auto">
             		<thead>
             			<tr> 
                            <th width="210" style="text-align: center"> Nombre </th>
             				<th width="210" style="text-align: center"> Estado </th> 
             				<th width="210" style="text-align: center"> Ver Propuestas </th>
              			</tr>
             		</thead>
             		<tbody>
                        <?php if($listarConvocatorias!='no hay'){ ?>
             			<?php for($i=0; $i<count($listarConvocatorias);$i++) { ?>
             			<tr>
                            <td style="text-align: center"> <?php echo utf8_decode($listarConvocatorias[$i]['nombre']); ?></td>
             				<td style="text-align: center"> <?php echo utf8_decode($listarConvocatorias[$i]['estado']);?></td>
                            <td style="text-align: center">
                                <a class="" href="<?php echo site_url('propuesta/listarPropuestasConEvaluaciones/'.$listarConvocatorias[$i]['idConvocatoria']); ?>">
                                       <img src="<?php echo base_url(); ?>img/iconos/listarPropuesta.png" title="Ver propuestas">
                                </a>
                            </td>
             			</tr>
                        <?php }?>
                        <?php }else{ ?>
                        <tr>
                            <td colspan='3' style="text-align: center">
                                No se encontraron convocatorias con propuestas que fueron evaluadas
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
        $("#buscar").click(function(){
            var anio = $("#select_anio").val();
            $.ajax({
            type: "POST",
            url: "<?php echo base_url().'index.php/propuesta/actualizarConvocatoriasConEvaluaciones';?>",
            data: "select_anio="+anio,
            dataType: "html",
            success: function(msg){
                $("#tabla").html(msg);
            }
            });
        });
    </script>
</html>