<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titulo;?></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<?php include("incluidos/head.php");?>

</head>
<body>

<div class="container-scroller">
      <?php include("incluidos/nav.php");?>
      <div class="container-fluid page-body-wrapper">
        <?php include("incluidos/menu.php");?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row purchace-popup">
                <?php include("incluidos/heading.php");?>
                <div class="container">
					<table  id="tabla-formulamedica">
						<thead >
							<tr>
								<th>Paciente</th>
					            <th>Medico</th>
					            <th>Observaciones</th>
					            <th>Referencia 1</th>
					            <th>Cantidad 1</th>
					            <th>Referencia 2</th>
					            <th>Cantidad 2</th>
					            <th>Referencia 3</th>
					            <th>Cantidad 3</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($listado as $fila) {
								?>
							<tr>
								<td><?php echo $fila["paciente"];?></td>
								<td><?php echo $fila["medico"];?></td>
								<td><?php echo $fila["observaciones"];?></td>
								<td><?php echo $fila["referencia1"];?></td>
								<td><?php echo $fila["cantidad1"];?></td>
								<td><?php echo $fila["referencia2"];?></td>
								<td><?php echo $fila["cantidad2"];?></td>
								<td><?php echo $fila["referencia3"];?></td>
								<td><?php echo $fila["cantidad3"];?></td>

							</tr>
							<?php } ?>			
						</tbody>
					</table>
				</div>
            </div>
          </div>
          <?php include("incluidos/footer.php");?>
        </div>
      </div>
    </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    $('#tabla-formulamedica').DataTable();
} );
</script>
</body>
</html>