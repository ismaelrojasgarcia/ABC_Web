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
					<td id="tdespacio"><a href="Index.html">Inicio</a>
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
	<tr align="left">
		<td align="left">
			&nbsp;Nombre:&nbsp;
		</td>
		<td><input type="text" name="nombre" size="25" disabled></td>
	</tr>
	
	<tr>
		<td></td>		
		<td align="center">
		<button type="submit" name="consultar">Consultar</button>
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
	/*if(!$id)
	{
		echo'<script type="text/javascript"> alert("Favor de colocar el Numero del Empleado"); window.location.href="PaginaBaja.php"; </script>';
	}*/
	baja($id);				
}
?>

<!--
?php
if (isset($_POST["consultar"]))
{
	$id = $_POST["clave"];
	if(!$id)
	{
		echo'<script type="text/javascript"> alert("Favor de colocar el Numero del Empleado"); window.location.href="PaginaBaja.php"; </script>';
	}
	$link=Conectarse();
	if ($link==0)
	{
		echo "<H1>Error en apertura de bases de datos.</H1>";
		exit();
	}

	$result=pg_query($link,"select nombre from CatalogoEmpleados where NumEmpleado=$id");
   //$row["ID"] NO ES LO MISMO QUE $row["id"] o que $row["Id"]
   $_POST["nombre"] =$result;
	  
   
   
   //liberamos memoria que ocupa la consulta...
   pg_free_result($result);
   
   //cerramos la conexión con el motor de BD
   pg_close($link);
}	
?>
-->

</body>
</html>