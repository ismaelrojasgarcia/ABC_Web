<!DOCTYPE html>
<html lang-"es">

<head>
   <title>ABC Web</title>
   <link rel="stylesheet" type="text/css" href="css/Estilos.css">
   <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <?php include('funciones/abc.php')?>

</head>

<body>
	<h2 align="center">ABC Web</h2>

	<?php
		$conexion = Conectarse();

		if (!$conexion)
		{
			echo "<h1>Error en abrir la bases de datos.</h1>";
			exit();
		}

		$consulta = "SELECT * FROM CatalogoEmpleados";
		
		$resultado = pg_query($conexion,$consulta) or die(pg_error());

		if (!$resultado) 
		{
			echo "Ocurrió un error al realizar la consulta.\n";
			exit();
		}		
	?>	


   <!-- Escribimos título de las tablas -->
   <table align="center" border=1 cellspacing=1 cellpadding=1 class="table table-dark col-sm-10" style="margin: auto;">
    	<tr>
			<th><b>NumEmpleado</b></th>
			<th><b>Nombre</b></td>
			<th><b>ApellidoPaterno</b></th>
			<th><b>ApellidoMaterno</b></th>
			<th><b>Dirección</b></th>
			<th><b>Centro</b></th>
			<th><b>CURP</b></th>
			<th><b>ACCION</b></th>
			<th><b>ACCION</b></th>
    	</tr>
	<?php
		
		while($filas = pg_fetch_row($resultado)) //pg_fetch_array
		{				
			$id=$filas["0"];
			$nombre=$filas['1'];
			$apellido1=$filas['2'];
			$apellido2=$filas['3'];
			$direccion=$filas['4'];
			$centro=$filas['5'];
			$curp=$filas['6'];
	?>
			<tr>
				<td><?php echo $id;?></td>
				<td><?php echo $nombre;?></td>
				<td><?php echo $apellido1;?></td>
				<td><?php echo $apellido2;?></td>
				<td><?php echo $direccion;?></td>
				<td><?php echo $centro;?></td>
				<td><?php echo $curp;?></td>
                <td><a href="ModificarEmpleado.php?clave=<?php echo $id;?>" class="btn btn-warning">Modificar</a></td>
                <td><a href="EliminarEmpleado.php?clave=<?php echo $id;?>" class="btn btn-danger" name="eliminar">Eliminar</a></td>
			</tr>
	<?php	
		}
	?>
	<tr>
		<td colspan="9">
			<a href="AltaEmpleado.php" class="btn btn-success" style="width: 100%;">Nuevo Registro</a>
		</td>
	</tr>
		<?php	
		//liberamos memoria que ocupa la consulta...
   		pg_free_result($resultado);
		//cerramos la conexión con el motor de BD
		pg_close($conexion);
	?>
	</table>

	<div align="right" id="margenpie">
		<!--a>by Paladin</a>-->
		<img src="imagenes/LogoCL.png">
	</div>
</body>
</html>