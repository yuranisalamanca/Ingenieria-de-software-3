<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox.css" />
        <script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
        <script src="<?php echo base_url(); ?>js/vendor/jquery.js"></script>
    </head>
    <body>
        <?php if ($this->session->userdata('varErrorCambiar') != '') { ?>
            <div id="varErrorCambiar" class="row" style="background-color: #F5A9BC"> &nbsp;<a style="color: #FF0000;" id="closeError">X</a> &nbsp; <?php echo $this->session->userdata('varErrorCambiar'); ?></div>
        <?php $this->session->unset_userdata('varErrorCambiar'); } ?>
        <label style="text-align: center"><h4>Seleccione los criterios por los cuales desea buscar los evaluadores</h4></label>
        </br>
            <div class="row">
                <form method="post" action="<?php echo site_url('propuesta/cambiarEvaluador/'.$idEv0.'/'.$idEv1.'/'.$idEv2.'/'.$idCambiado.'/'.$idPropuesta); ?>">
                <input type="hidden" name="select" value="1">
                <input type="hidden" name="select_organizacion" value="<?php echo $organizacion; ?>">
                    <table style="margin-left: 15%">
                        <thead>
                            <tr>
                                <th style="text-align: center">Criterio</th>
                                <th style="text-align: center">Valor</th>
                                <th style="text-align: center">Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center"><label>Nombre evaluador</label></td>
                                <td style="text-align: center"><input name="select_nombre"></td>
                                <td style="text-align: center"><input name="nombre" type="checkbox"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><label>&Aacute;rea de conocimiento</label></td>
                                <td style="text-align: center"><label><?php echo $area['nombre']; ?></label></td>
                                <input type="hidden" value="<?php echo $area['id']; ?>" name="select_area">
                                <td style="text-align: center"><input name="area" type="checkbox"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><label>Calificaci&oacute;n</label></td>
                                <td style="text-align: center">
                                    <select name="select_calificacion">
                                        <option value="0" selected="selected" disabled="disabled">Seleccione...</option>
                                        <?php for ($i=1; $i < 11; $i++) { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td style="text-align: center"><input name="calificacion" type="checkbox"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><label>Ciudad</label></td>
                                <td style="text-align: center"><label><?php echo $ciudad['nombre']; ?></label></td>
                                <input type="hidden" value="<?php echo $ciudad['id']; ?>" name="select_ciudad">
                                <td style="text-align: center"><input name="ciudad" type="checkbox"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><label>Nivel de formaci&oacute;n</label></td>
                                <td style="text-align: center">
                                    <select name="select_nivel">
                                        <option value="0" selected="selected" disabled="disabled">Seleccione...</option>
                                        <?php for ($i=0; $i < count($niveles); $i++) { ?>
                                            <option value="<?php echo $niveles[$i]['idNivel_Formacion']; ?>"><?php echo $niveles[$i]['Nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td style="text-align: center"><input name="nivel" type="checkbox"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><label>Idioma</label></td>
                                <td style="text-align: center">
                                    <select name="select_idioma">
                                        <option value="0" selected="selected" disabled="disabled">Seleccione...</option>
                                        <?php for ($i=0; $i < count($idiomas); $i++) { ?>
                                            <option value="<?php echo $idiomas[$i]['ididioma']; ?>"><?php echo $idiomas[$i]['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td style="text-align: center"><input name="idioma" type="checkbox"></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" class="button" style="margin-left: 37%" value="Iniciar B&uacute;squeda">
                </form>
        </div>
    </body>
    <script type="text/javascript">
    $('#closeError').click(function (){
        $('#varErrorCambiar').hide(1000);
    });
    </script>
</html>