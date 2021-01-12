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


	<nav class="menu" >
		<div align="center">
			<table align="center">
				<tr>
					<td id="tdespacio"><a href="PaginaAlta.php" class="btn btn-success">Alta</a>
					<td id="tdespacio"><a href="PaginaBaja.php">Baja</a>
					<td id="tdespacio"><a href="PaginaCambio.php">Cambio</a>
				</tr>
			</table>
		</div>			
	</nav>


   <!-- Escribimos título de las tablas -->
   <table align="center" border=1 cellspacing=1 cellpadding=1 class="table table-dark col-sm-8" style="margin: auto;">
    <tr>
		<td><b>&nbsp;NumEmpleado&nbsp;</b></td>
		<td><b>&nbsp;Nombre&nbsp;</b></td>
		<td><b>&nbsp;ApellidoPaterno&nbsp;</b></td>
		<td><b>&nbsp;ApellidoMaterno&nbsp;</b></td>
		<td><b>&nbsp;Dirección&nbsp;</b></td>
		<td><b>&nbsp;Centro&nbsp;</b></td>
		<td><b>&nbsp;CURP&nbsp;</b></td>
        </tr>

	<?php
		$link=Conectarse();
		if ($link==0)
		{
			echo "<H1>Error en apertura de bases de datos.</H1>";
			exit();
		}	
		$result=pg_query($link,"select * from CatalogoEmpleados");


   		//$row["ID"] NO ES LO MISMO QUE $row["id"] o que $row["Id"]
   		while($row = pg_fetch_row($result)) {
	  		echo "<tr>";
	  		echo "<td>&nbsp;" . $row["0"] . "</td>";
	  		echo "<td>&nbsp;" . $row["1"] . "</td>";
	  		echo "<td>&nbsp;" . $row["2"] . "</td>";
	  		echo "<td>&nbsp;" . $row["3"] . "</td>";
	  		echo "<td>&nbsp;" . $row["4"] . "</td>";
	  		echo "<td>&nbsp;" . $row["5"] . "</td>";
	  		echo "<td>&nbsp;" . $row["6"] . "</td>";
	  		echo "</tr>";
   		}
   
   		//liberamos memoria que ocupa la consulta...
   		pg_free_result($result);
   
	   //cerramos la conexión con el motor de BD
   		pg_close($link);
	?>
	</table>

	<div align="right" id="margenpie">by Paladín</div>
</body>
</html>