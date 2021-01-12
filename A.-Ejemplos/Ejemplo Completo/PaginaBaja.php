<!DOCTYPE html>
<html>

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
					<td id="tdespacio"><a href="Index.php">Inicio</a>
					<td id="tdespacio"><a href="PaginaCambio.php">Cambio</a>
				</tr>
			</table>
		</div>			
	</nav>

<form align="center"  method="post">
<table align="center">
	<tr align="left">
		<td>
			Num.Empleado:
		</td>
		<td><input type="number" name="clave" size="8" required min="90000000" max="99999999"></td>	
	</tr>	
	<tr>
		<td></td>
		<td align="center">
			<button type="submit" name="eliminar">Eliminar</button>
		</td>		
	</tr>
</table>
</form>

<?php
//Se tomo el nombre colocado para referenciar.
if (isset($_POST["eliminar"]))
{
	$id = $_POST["clave"];
	baja($id);				
}
?>
</body>
</html>