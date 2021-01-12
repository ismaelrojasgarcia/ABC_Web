<!DOCTYPE html>
<html lang-"es">

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
					<td id="tdespacio"><a href="Index.php">Inicio</a>
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
				<td><input type="number" name="clave" size="8"  min="90000000" max="99999999" required></td>
			</tr>
			<tr align="left">
				<td align="left">
					Nombre(s):
				</td>
				<td><input type="text" name="nombre" size="25" maxlength="25" required></td>
			</tr>
			<tr align="left">
				<td>
					Apellido Paterno:
				</td>
				<td><input type="text" name="apellido1" size="25" maxlength="25" required></td>
			</tr>
			<tr align="left">
				<td>
					Apellido Materno:
				</td>
				<td><input type="text" name="apellido2" size="25" maxlength="25" required></td>
			</tr>
			<tr align="left">
				<td>
					Dirección:
				</td>
				<td><input type="text" name="direccion" size="25" maxlength="25" required></td>
			</tr>
			<tr align="left">
				<td>
					Centro:
				</td>
				<td><input type="number" name="centro" size="6" min="0" max="999999" required></td>
			</tr>
			<tr align="left">
				<td>
					CURP:
				</td>
				<td><input type="text" name="curp" size="18" minlength="18" maxlength="18" required></td>
			</tr>
			<tr>
				<td></td>		
				<td align="center">
				<button type="submit" name="grabar">Grabar</button>
				<button type="reset">Limpiar</button>
				</td>		
			</tr>
		</table>
	</form>


<?php
	// En base a los datos recibidos (nombre, direccion, etc), hacemos el alta.
	if (isset($_POST["grabar"]))
	{	
		$clave = $_POST["clave"];
		$nombre = $_POST["nombre"];
		$apellido1 = $_POST["apellido1"];
		$apellido2 = $_POST["apellido2"];
		$direccion = $_POST["direccion"];
		$centro = $_POST["centro"];
		$curp = $_POST["curp"];
		//Mandamos llamar a la función alta
		alta ($clave,$nombre,$apellido1,$apellido2,$direccion,$centro,$curp);	
	}
?>

</body>
</html>