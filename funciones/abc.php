<?php
	function Conectarse()
	{
		//Cadena de Conexión
		$conn_string = "host=localhost port=5432 dbname=unica user=postgres password=''";

		//Establecemos una conexion con el servidor postgresSQL
		$dbconn = pg_connect($conn_string) or die('No se ha podido conectar:'.pg_last_error());

		// Revisamos el estado de la conexion en caso de errores. 
		if(!$dbconn) 
  		{
  			echo "Error: No se ha podido conectar a la base de datos\n";
  		} 
  		else
    	{
    		return $dbconn;
    	}
	}
//-----------------------------------------------------------------------\\
	function alta ($clave,$nombre,$apellido1,$apellido2,$direccion,$centro,$curp)
	{
		$conexion = Conectarse();

		if (!$conexion)
		{
			echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
			exit();
		}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "INSERT INTO CatalogoEmpleados VALUES ($clave,'$nombre','$apellido1','$apellido2','$direccion',$centro,'$curp')";

		echo $consulta;

		$resultado=pg_query($conexion,$consulta);

		echo $resultado;

		if (!$resultado) 
		{
			echo "Ocurrió un error al realizar la consulta.\n";
			exit();
		}
		else
		{
			echo'<script type="text/javascript"> alert("Empleado agregado correctamente"); window.location.href="PaginaAlta.php"; </script>';
		}	

		//cerramos la conexión con el motor de BD
		pg_close($conexion);
	}

//-----------------------------------------------------------------------\\  
	function baja ($id)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de baja. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "DELETE FROM CatalogoEmpleados WHERE NumEmpleado = $id";

		echo $consulta . "<BR>";

		$resultado=pg_query($conexion,$consulta);

		if (!$resultado) 
		{
			echo "Ocurrió un error al realizar la consulta.\n";
			exit();
		}
		else
		{
			echo'<script type="text/javascript"> alert("El Empleado se Elimino Corecctamente"); window.location.href="Index.php"; </script>';;
		}
		//cerramos la conexión con el motor de BD
		pg_close($conexion);
	}
//-----------------------------------------------------------------------\\
function consultadatos($id)
{
	//me conecto a la BD y SELECCIONO el registro cuyo ID fue pasado.
	$conexion = Conectarse();

	if (!$conexion)
	{
		echo "Ocurrió un error al realizar la consulta.\n";
		exit();
	}
	
	$consulta = "SELECT * FROM CatalogoEmpleados WHERE NumEmpleado = $id";
	
	//echo $consulta . "<br>";
    $resultado = pg_query($conexion,$consulta);
    if (!$resultado) 
	{
		echo "Ocurrió un error al realizar la consulta.\n";
		exit();
	}

	$fila = pg_fetch_array($resultado);
	if (!$fila)
	{		
		echo'<script type="text/javascript"> alert("Regisros inexistente"); window.location.href="PaginaCambio.php"; </script>';
		exit();
	}

	//cerramos la conexión con el motor de BD
	pg_close($conexion);

}
//-----------------------------------------------------------------------\\	
	function modificar ($clave,$nombre,$apellido1,$apellido2,$direccion,$centro,$curp)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "UPDATE CatalogoEmpleados SET Nombre='$nombre',ApellidoPaterno='$apellido1',ApellidoMaterno='$apellido2',Direccion='$direccion',Centro='$centro',CURP='$curp' WHERE NumEmpleado = '$clave'";;
        //$consulta = $consulta . "WHERE NumEmpleado = $clave";

		echo $consulta;

		$resultado=pg_query($conexion,$consulta);

		if (!$resultado) 
		{
			echo "Ocurrió un error al grabar.\n";
			exit();
		}
		else
		{
			echo'<script type="text/javascript"> alert("Empleado modificado correctamente"); window.location.href="PaginaCambio.php"; </script>';
		}

		//cerramos la conexión con el motor de BD
		pg_close($conexion);
	}
?>