<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>ABC Web</title>
	<link rel="stylesheet" type="text/css" href="css/Estilos.css">
	<!--Se usa para incluir las funciones a usar-->
	<?php include('funciones/abc.php')?>
</head>

<body>
	<h2 align="center">ABC Web</h2>

	<nav class="menu" >
		<div align="center">
			<table align="center">
				<tr>
					<td id="tdespacio"><a href="PaginaAlta.php">Alta</a>
					<td id="tdespacio"><a href="PaginaBaja.php">Baja</a>
					<td id="tdespacio"><a href="Index.php">Inicio</a>
				</tr>
			</table>
		</div>			
	</nav>

	<?php
		$conexion = Conectarse();

		if (!$conexion)
		{
			echo "<h1>No se puede modificar. Error al conectar.</h1>";
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
	
	<table align="center" border=1 cellspacing=1 cellpadding=1>
		<tr>
			<td><b>NumEmpleado</b></td>
			<td><b>Nombre</b></td>
            <td><b>ApellidoPaterno</b></td>
            <td><b>ApellidoMaterno</b></td>
            <td><b>Direccion</b></td>
            <td><b>Centro</b></td>
            <td><b>CURP</b></td>
            <td><b>ACCION</b></td>
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
                <td><a href="ModificarEmpleado.php?clave=<?php echo $id;?>">Modificar</a></td>
			</tr>
<?php	
		}
		//echo "<tr> <td colspan=\"8\"><a href=\"PaginaAlta>\">Nuevo Registro</a></td> </tr>";
		//cerramos la conexión con el motor de BD
		pg_close($conexion);
?>
	</table>
	

</body>
</html>