<?php
	include('funciones/abc.php');
	$ID = $_GET["clave"];

	$conexion = Conectarse();

	if (!$conexion)
	{
		echo "<h1>No se puede modificar. Error al conectar.</h1>";
		exit();
	}
	
	$consulta = "SELECT * FROM CatalogoEmpleados WHERE NumEmpleado=$ID";
		
	$resultado = pg_query($conexion,$consulta) or die(pg_error());

	if (!$resultado) 
	{
		echo "<h1>Ocurrió un error al realizar la consulta.</h1>\n";
		exit();
	}
	
	while($fila = pg_fetch_array($resultado)) //pg_fetch_row
	{	
		$id=$fila["0"];
		$nombre=$fila['1'];
		$apellido1=$fila['2'];
		$apellido2=$fila['3'];
		$direccion=$fila['4'];
		$centro=$fila['5'];
		$curp=$fila['6'];
	}
?>




<!DOCTYPE html>
<html lang-"es">

<head>
	<title>ABC Web</title>	
	<link rel="stylesheet" type="text/css" href="css/Estilos.css">
</head>

<body>
<h2 align="center">ABC Web</h2>

	<nav class="menu" >
		<div align="center">
			<table align="center">
				<tr>
					<td id="tdespacio"><a href="PaginaAlta.php">Alta</a>
					<td id="tdespacio"><a href="PaginaBaja.php">Baja</a>
					<td id="tdespacio"><a href="PaginaCambio.php">Cambio</a>
				</tr>
			</table>
		</div>			
	</nav>
<form align="center" method="post">
<table align="center">
	<tr align="left">
		<td>
			Num.Empleado:
		</td>
		<td>
			<input type="number" name="clave" size="8"  disabled value="<?php echo $id;?>">
		</td>		
	</tr>
	<tr align="left">
		<td align="left">
			Nombre:
		</td>
		<td><input type="text" name="nombre" size="25" maxlength="25" required value="<?php echo $nombre;?>"></td>
	</tr>
	<tr align="left">
		<td>
			Apellido Paterno:
		</td>
		<td><input type="text" name="apellido1" size="25" maxlength="25" required value="<?php echo $apellido1;?>"></td>
	</tr>
	<tr align="left">
		<td>
			Apellido Materno:
		</td>
		<td><input type="text" name="apellido2" size="25" maxlength="25" required value="<?php echo $apellido2;?>"></td>
	</tr>
	<tr align="left">
		<td>
			Dirección:
		</td>
		<td><input type="text" name="direccion" size="25" maxlength="25" required value="<?php echo $direccion;?>"></td>
	</tr>
	<tr align="left">
		<td>
			Centro:
		</td>
		<td><input type="number" name="centro" size="6" min="0" max="999999" required value="<?php echo $centro;?>"></td>
	</tr>
	<tr align="left">
		<td>
			CURP:
		</td>
		<td><input type="text" name="curp" size="18" maxlength="18" required value="<?php echo $curp;?>"></td>
	</tr>
	<tr>
		<td></td>
		<td align="center">
			<button type="submit" name="grabarcambios">Grabar Cambios</button>
		</td>
	</tr>
</table>
</form>


<?php
	// En base a los datos recibidos (nombre, direccion, etc), hacemos el alta.
	if (isset($_POST["grabarcambios"]))
	{			
		$nombre = $_POST["nombre"];
		$apellido1 = $_POST["apellido1"];
		$apellido2 = $_POST["apellido2"];
		$direccion = $_POST["direccion"];
		$centro = $_POST["centro"];
		$curp = $_POST["curp"];
		//Mandamos llamar a la función alta
		modificar ($id,$nombre,$apellido1,$apellido2,$direccion,$centro,$curp);	
	}
?>
</body>
</html>