<!DOCTYPE html>
<html lang-"es">

<head>
	<title>ABC Web</title>	
	<link rel="stylesheet" type="text/css" href="css/Estilos.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!--Se usa para incluir las funciones a usar-->
	<?php include('funciones/abc.php')?>
</head>

<body>
	<h2 align="center">ABC Web</h2>

	<form method="post" class="col-sm-6" style="margin: auto;">
		<div class="form-group">
	    	<label>Num.Empleado:</label>
	    	<input type="number" class="form-control" placeholder="Num.Empleado" name="clave" size="8"  min="90000000" max="99999999" required>
	  	</div>

	  	<div class="form-group">
	    	<label>Nombre(s):</label>
	    	<input type="text"class="form-control" placeholder="Num.Empleado" name="nombre" size="25" maxlength="25" required>
	  	</div>

	  	<div class="form-group">
	    	<label>Apellido Paterno:</label>
	    	<input type="text" class="form-control" placeholder="Apellido Paterno" name="apellido1" size="25" maxlength="25" required>
	  	</div>	  	

	  	<div class="form-group">
	    	<label>Apellido Materno:</label>
	    	<input type="text" class="form-control" placeholder="Apellido Materno" name="apellido2" size="25" maxlength="25" required>
	  	</div>

	  	<div class="form-group">
	    	<label>Dirección:</label>
	    	<input type="text" class="form-control" placeholder="Dirección" name="direccion" size="25" maxlength="25" required>
	  	</div>

	  	<div class="form-group">
	    	<label>Centro</label>
	    	<input type="number" class="form-control" placeholder="Centro" name="centro" size="6" min="0" max="999999" required>
	  	</div>

	  	<div class="form-group">
	    	<label>CURP:</label>
	    	<input type="text" class="form-control" placeholder="Num.Empleado" name="curp" size="18" minlength="18" maxlength="18" required>
	  	</div>

	  	<div class="form-group">
	  		<button type="submit" name="grabar" class="btn btn-success">Grabar</button>
			<button type="reset" class="btn btn-primary">Limpiar</button>
			<a href="Index.php" class="btn btn-info">Regresar</a>
	  	</div>

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
	<div align="right" id="margenpie">
		<!--a>by Paladin</a>-->
		<img src="imagenes/LogoCL.png">
	</div>
</body>
</html>