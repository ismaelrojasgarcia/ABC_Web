<?php
	// Acá, en base al ID recibido, pedimos los datos para MODIFICAR.
	if ($_GET["accion"] == "datos_modificacion")
	{
		include("pg.php");

		//me conecto a la BD y SELECCIONO el registro cuyo ID fue pasado.
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>Error al intentar conectar a BD</h1>";
				echo "<br>" . "<a href=\"/\">Volver a la agenda</a>";
				exit();
			}

		$id = $_GET["txtId"];
		$consulta = "SELECT * FROM tabla WHERE id = $id";

		echo $consulta . "<br>";

		$resultado = pg_query($consulta, $conexion);

		$fila = pg_fetch_array($resultado);

		if (!$fila)
		{
			echo "<h1>Registro inexistente</h1>";
			echo "<br>" . "<a href=\"/\">Volver a la agenda</a>";
			exit();
		}

		//cargo los datos del registro en variables para que sea más cómodo trabajar.

        $name = $fila["name"];

		   //liberamos memoria que ocupa la consulta...
		   pg_free_result($resultado);

		   //cerramos la conexión con el motor de BD
		   pg_close($conexion);

		/*
		ahora que teóricamente tengo los datos del registro que quiero modificar, muestro
		el formulario de carga.
		*/
		echo "<h1>Modificar un registro</h1>";
		echo "<br>";
		echo "<FORM ACTION=\"abc.php\" METHOD=\"GET\">";
		echo "name: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtname\" VALUE=\"$name\">" . "<BR>";

                        echo "<BR>";
		echo "<INPUT TYPE=\"submit\" NAME=\"submit\">";
		echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"realizar_modificacion\">";
		echo "<INPUT TYPE=\"hidden\" NAME=\"id\" VALUE=\"$id\">";
		echo "</FORM>";

		echo "<br>" . "<a href=\"/\">Volver a la agenda</a>";
	}
?>

<?php
	// Acá, en base al ID recibido, hacemos la modificación.
	if ($_GET["accion"] == "realizar_modificacion")
	{
		include("pg.php");

        $id = $_GET["id"];
		$name = $_GET["txtname"];

		modificacion($id, $name);
		echo "<br>" . "<a href=\"/\">Volver a la agenda</a>";
	}
?>