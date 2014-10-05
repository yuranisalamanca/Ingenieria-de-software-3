
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Propuestas</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/modernizr.js"></script>
</head>
    <body>
        
        <br>
        <div class="row">
          <div class="row" style="padding-left:100px;">
         	<br>
            
         <div>
         	<table>
         		<thead>
         			<tr> 
         				<th width="210"> Titulo </th>
         				<th width="210"> Estado </th>
         				<th width="210"> Organizacion </th> 
         				<th width="210"> Institucion </th>
         				<th width="210"> Linea tematica </th>
          				<th width="210"> Tipo de evaluacion </th>
         			</tr>
         		</thead>
         		<tbody>
         			<?php for($i=0; $i<count($propuestas);$i++) { ?>
         			<tr>
         				<td> <?php echo $propuestas[$i]['titulo']; ?> </td>
         				<td> <?php echo $propuestas[$i]['estado']; ?> </td>
          				<td> <?php echo $propuestas[$i]['Organizacion_idOrganizacion']; ?> </td>
         				<td> <?php echo $propuestas[$i]['Institucion_idInstitucion']; ?> </td>
         				<td> <?php echo $propuestas[$i]['Linea_tematica_idLinea_tematica']; ?> </td>
         				<td> <?php echo $propuestas[$i]['tipo_evaluacion_idtipo_evaluacion'];} ?> </td>
         			</tr>
         		</tbody>
         	</table>

		¨</div>
		
	</div>

	</body>
	<script type="text/javascript"></script>
</html>  