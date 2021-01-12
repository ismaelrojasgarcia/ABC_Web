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
					<td id="tdespacio"><a href="PaginaAlta.php">Alta</a>
					<td id="tdespacio"><a href="PaginaBaja.php">Baja</a>
					<td id="tdespacio"><a href="Index.html">Inicio</a>
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
			<input type="number" name="clave" size="8"  min="90000000" max="99999999" required></td>
		<td>
			<button type="Buscar" name="buscar">Buscar</button>
		<tr><td id="margen"></td></tr>
	</tr>


	<tr align="left">
		<td align="left">
			Nombre(s):
		</td>
		<td><input type="text" name="nombre" size="25" maxlength="25" required></td>
	</tr>


<?php
//Se tomo el nombre colocado para referenciar.
if (isset($_POST["buscar"]))
{
	$id = $_POST["clave"];	
	$respuesta=consultadatos($id);
	$dato=$respuesta["nombre"];
}
?>

<?php
	// En base a los datos recibidos (nombre, direccion, etc), hacemos el alta.
	if (isset($_POST["grabarcambios"]))
	{	
		$clave = $_POST["clave"];
		$nombre = $_POST["nombre"];
		$apellido1 = $_POST["apellido1"];
		$apellido2 = $_POST["apellido2"];
		$direccion = $_POST["direccion"];
		$centro = $_POST["centro"];
		$curp = $_POST["curp"];
		//Mandamos llamar a la función alta
		modificar ($clave,$nombre,$apellido1,$apellido2,$direccion,$centro,$curp);	
	}
?>
<!--
?php
if(isset($_POST["buscar"]))
{
	echo	"<tr align=\"left\">";
	echo		"<td align=\"left\">";
	echo			"Nombre:";
	echo		"</td>";
	echo		"<td><input type=\"text\" name=\"nombre\" size=\"25\" maxlength=\"25\">$dato->nombre</td>";
	echo	"</tr>";
	echo	"<tr align=\"left\">";
	echo		"<td>";
	echo			"Apellido Paterno:";
	echo	"</td>";
	echo		"<td><input type=\"text\" name=\"apellido1\" size=\"25\" maxlength=\"25\"></td>";
	echo	"</tr>";
	echo	"<tr align=\"left\">";
	echo		"<td>";
	echo			"Apellido Materno:";
	echo		"</td>";
	echo		"<td><input type=\"text\" name=\"apellido2\" size=\"25\" maxlength=\"25\"></td>";
	echo	"</tr>";
	echo	"<tr align=\"left\">";
	echo		"<td>";
	echo			"Centro:";
	echo		"</td>";
	echo		"<td><input type=\"number\" name=\"centro\" size=\"6\" min=\"0\" max=\"999999\" required></td>";
	echo	"</tr>";
	echo	"<tr align=\"left\">";
	echo		"<td>";
	echo			"CURP:";
	echo		"</td>";
	echo		"<td><input type=\"text\" name=\"curp\" size=\"18\" maxlength=\"18\"></td>";
	echo	"</tr>";
	echo	"<tr>";
	echo		"<td></td>";
	echo		"<td align=\"center\">";
	echo			"<button type=\"submit\" name=\"grabarcambios\">Grabar Cambios</button>";
	echo		"</td>";
	echo	"</tr>";
	echo "</table>";
	echo "</form>";
}
?>
-->
</body>
</html>