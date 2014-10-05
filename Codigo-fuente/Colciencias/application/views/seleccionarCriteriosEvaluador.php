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
        <label style="text-align: center"><h3>Seleccione los criterios por los cuales desea buscar los evaluadores</h3></label>
        </br>
            <div class="row">
                <form method="post" action="<?php echo site_url('propuesta/buscarEvaluadores/'.$idPropuesta); ?>">
                <input type="hidden" name="select" value="1">
                    <table style="margin-left: 25%">
                        <thead>
                            <tr>
                                <th style="text-align: center">Criterio</th>
                                <th style="text-align: center">Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center"><label>&Aacute;rea de conocimiento</label></td>
                                <td style="text-align: center"><input name="check_area" type="checkbox"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><label>Calificaci&oacute;n</label></td>
                                <td style="text-align: center"><input name="check_calificacion" type="checkbox"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><label>Ciudad</label></td>
                                <td style="text-align: center"><input name="check_ciudad" type="checkbox"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><label>Experiencia</label></td>
                                <td style="text-align: center"><input name="check_experiencia" type="checkbox"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><label>Nivel de formaci&oacute;n</label></td>
                                <td style="text-align: center"><input name="check_nivel" type="checkbox"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><label>Organizaci&oacute;n</label></td>
                                <td style="text-align: center"><input name="check_organizacion" type="checkbox"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><label>Idioma</label></td>
                                <td style="text-align: center"><input name="check_idioma" type="checkbox"></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" class="button" style="margin-left: 30%" value="Iniciar B&uacute;squeda">
                </form>
        </div>
    </body>
</html>