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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<h2 align="center">ABC Web</h2>

<form method="post" class="col-sm-6" style="margin: auto;">
	<div class="form-group">
    	<label>Num.Empleado:</label>
    	<input type="number" class="form-control" name="clave" size="8"  value="<?php echo $id;?>" disabled>
  	</div>

  	<div class="form-group">
    	<label>Nombre(s):</label>
    	<input type="text" class="form-control" placeholder="Num.Empleado" name="nombre" size="25" maxlength="25" value="<?php echo $nombre;?>" required>
  	</div>

  	<div class="form-group">
    	<label>Apellido Paterno:</label>
    	<input type="text" class="form-control" placeholder="Apellido Paterno" name="apellido1" size="25" maxlength="25" value="<?php echo $apellido1;?>" required>
  	</div>	  	

  	<div class="form-group">
    	<label>Apellido Materno:</label>
    	<input type="text" class="form-control" placeholder="Apellido Materno" name="apellido2" size="25" maxlength="25" value="<?php echo $apellido2;?>" required>
  	</div>

  	<div class="form-group">
    	<label>Dirección:</label>
    	<input type="text" class="form-control" placeholder="Dirección" name="direccion" size="25" maxlength="25" value="<?php echo $direccion;?>" required>
  	</div>

  	<div class="form-group">
    	<label>Centro</label>
    	<input type="number" class="form-control" placeholder="Centro" name="centro" size="6" min="0" max="999999" value="<?php echo $centro;?>" required>
  	</div>

  	<div class="form-group">
    	<label>CURP:</label>
    	<input type="text" class="form-control" placeholder="Num.Empleado" name="curp" size="18" minlength="18" maxlength="18" value="<?php echo $curp;?>" required>
  	</div>

  	<div class="form-group">
  		<button type="submit" name="grabarcambios" class="btn btn-success" style="width: 30%;">Grabar Cambios</button>		
		<a href="Index.php" class="btn btn-info">Regresar</a>
  	</div>
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
	<div align="right" id="margenpie">
		<!--a>by Paladin</a>-->
		<img src="imagenes/LogoCL.png">
	</div>
</body>
</html>