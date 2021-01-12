<?php
	function Conectarse()
	{
	//Cadena de Conexión
	$conn_string = "host=10.41.246.68 port=5432 dbname=tienda.0950 user=syscontrolprogramacion password=f45459f3627a6d7372b261324aa4b574";

	//inttroducimos los datos de  host que son "Server", "usuario" y "contraseña" 
		if (!($link=pg_connect($conn_string) or die('No se ha podido conectar:'.pg_last_error())))//aca hay que introducir los datos que especifique arriba!!!
		{
			return 0;
		}
		return $link;
	}

//-----------------------------------------------------------------------\\
	function alta ($calve,$nombre,$apellido1,$apellido2,$direccion,$centro,$curp)
	{
		$conexion = Conectarse();

		if (!$conexion)
		{
			echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
			exit();
		}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "INSERT INTO CatalogoEmpleados VALUES ($calve,'$nombre','$apellido1','$apellido2','$direccion',$centro,'$curp')";

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
			echo'<script type="text/javascript"> alert("Empleado agregado correctamente"); window.location.href="abc.php?accion=alta"; </script>';
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
			echo'<script type="text/javascript"> alert("El empleado se Elimino Corecctamente"); window.location.href="abc.php?accion=baja"; </script>';;
		}
		//cerramos la conexión con el motor de BD
		pg_close($conexion);
	}

//-----------------------------------------------------------------------\\
	function modificacion ($id, $name)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.

		/*
		UPDATE `agenda` SET `nombre` = 'pepe3',
						`tel` = '467641_1',
						`direccion` = 'ch 149_1',
						`mail` = 'pepe@host2.com.ar' WHERE `agenda`.`id` =2
		*/

		$consulta = "UPDATE tabla SET name = '$name',";
                $consulta = $consulta . "WHERE id = $id";

		echo $consulta;

		$resultado=pg_query($conexion,$consulta);

			//cerramos la conexión con el motor de BD
			pg_close($conexion);
	}

?>