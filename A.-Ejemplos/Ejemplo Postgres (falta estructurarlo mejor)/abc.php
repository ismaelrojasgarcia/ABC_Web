<html>
	<head>
		<!-- de acuerdo al contenido de la variable "accion", escribimos el título -->
		<?php
			if ($_GET["accion"] == "alta")
				echo "<title>" . "Alta de Empleado" . "</title>";

			if ($_GET["accion"] == "baja")
				echo "<title>" . "Baja de Empleado" . "</title>";

			if ($_GET["accion"] == "modificacion")
				echo "<title>" . "Modificaci&oacute;n de Empleado" . "</title>";
		?>
		<link rel="stylesheet" type="text/css" href="css/Estilos.css">
	</head>
<?php//-----------------------------------------------------------------\\ ?>
	<body>
		<!--<div align="center">
			<table align="center">
				<tr>
					<td id="tdespacio"><a href="index.php">Inicio</a>
					<td id="tdespacio"><a href="abc.php?accion=baja">Baja</a>
					<td id="tdespacio"><a href="abc.php?accion=modificacion">Cambio</a>
				</tr>
			</table>
		</div>-->
<?php//-----------------------------------------------------------------\\ ?>
		<?php
			// mostramos la pantalla de carga de ALTAS.
			if ($_GET["accion"] == "alta")
			{
				echo "<h1 align=\"center\">"."Alta de Empleado"."</h1>";
				echo "<div align=\"center\">";
				echo "<table align=\"center\">";
				echo "<tr>";
				echo "<td id=\"tdespacio\"><a href=\"index.php\">Inicio</a>";
				echo "<td id=\"tdespacio\"><a href=\"abc.php?accion=baja\">Baja</a>";
				echo "<td id=\"tdespacio\"><a href=\"abc.php?accion=modificacion\">Cambio</a>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";

				echo "<form align=\"center\" action=\"abc.php\" method=\"get\">";
				echo	"<table align=\"center\">";
				echo		"<tr align=\"left\">";
				echo			"<td>";
				echo				"Num.Empleado:";
				echo			"</td>";
				echo			"<td><input type=\"text\" name=\"clave\" size=\"8\" maxlength=\"8\"></td>";
				echo		"</tr>";
				echo		"<tr align=\"left\">";
				echo			"<td align=\"left\">";
				echo				"Nombre(s):";
				echo			"</td>";
				echo			"<td><input type=\"text\" name=\"nombre\" size=\"25\" maxlength=\"25\"></td>";
				echo		"</tr>";
				echo		"<tr align=\"left\">";
				echo			"<td>";
				echo				"Apellido Paterno:";
				echo			"</td>";
				echo			"<td><input type=\"text\" name=\"apellido1\" size=\"25\" maxlength=\"25\"></td>";
				echo		"</tr>";
				echo		"<tr align=\"left\">";
				echo			"<td>";
				echo				"Apellido Materno:";
				echo			"</td>";
				echo			"<td><input type=\"text\" name=\"apellido2\" size=\"25\" maxlength=\"25\"></td>";
				echo		"</tr>";
				echo		"<tr align=\"left\">";
				echo			"<td>";
				echo				"Dirección:";
				echo			"</td>";
				echo			"<td><input type=\"text\" name=\"direccion\" size=\"25\" maxlength=\"25\"></td>";
				echo		"</tr>";
				echo		"<tr align=\"left\">";
				echo			"<td>";
				echo				"Centro:";
				echo			"</td>";
				echo			"<td><input type=\"text\" name=\"centro\" size=\"6\" maxlength=\"6\"></td>";
				echo		"</tr>";
				echo		"<tr align=\"left\">";
				echo			"<td>";
				echo				"CURP:";
				echo			"</td>";
				echo			"<td><input type=\"text\" name=\"curp\" size=\"18\" maxlength=\"18\"></td>";
				echo		"</tr>";		
				echo		"<tr>";
				echo			"<td></td>";		
				echo			"<td align=\"center\">";
				echo				"<input type=\"submit\" id=\"tamaño\" value=\"Grabar\">";
				echo 				"<input type=\"hidden\" name=\"accion\" value=\"realizar_alta\">";
				echo				"<input type=\"reset\" id=\"tamaño\" value=\"Limpiar\">";
				echo			"</td>";		
				echo		"</tr>";
				echo	"</table>";
				echo "</form>";
				exit();
			}
		?>		
		<?php
			// En base a los datos recibidos (nombre, direccion, etc), hacemos el alta.
			if ($_GET["accion"] == "realizar_alta")
			{
				include("pg.php");

				$calve = $_GET["clave"];
				$nombre = $_GET["nombre"];
				$apellido1 = $_GET["apellido1"];
				$apellido2 = $_GET["apellido2"];
				$direccion = $_GET["direccion"];
				$centro = $_GET["centro"];
				$curp = $_GET["curp"];
				
				//Mandamos llamar a la función alta
				alta ($calve,$nombre,$apellido1,$apellido2,$direccion,$centro,$curp);	
			}
		?>
<?php//-----------------------------------------------------------------\\ ?>
		<?php
			//Acá solicitamos el ID para poder modificar el registro.
			if ($_GET["accion"] == "modificacion")
			{
				echo "<h1>Modificar un registro</h1>";
				echo "<br>";
				echo "<FORM ACTION=\"abc.php\" METHOD=\"GET\">";
					echo "ID: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtId\">" . "<BR>";
					echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"datos_modificacion\">";
				echo "</FORM>";

				echo "<br>" . "<a href=\"/\">Volver a la agenda</a>";

				exit();
			}
		?>
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
<?php//-----------------------------------------------------------------\\ ?>
		<?php
			// Acá mostramos la pantalla de carga de BAJAS.
			if ($_GET["accion"] == "baja")
			{
				$disabled = 'disabled';
				echo "<h1 align=\"center\">Baja de Empleado</h1>";
				echo "<div align=\"center\">";
				echo "<table align=\"center\">";
				echo "<tr>";
				echo "<td id=\"tdespacio\"><a href=\"abc.php?accion=alta\">Alta</a>";
				echo "<td id=\"tdespacio\"><a href=\"index.php\">Inicio</a>";
				echo "<td id=\"tdespacio\"><a href=\"abc.php?accion=modificacion\">Cambio</a>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";


				echo "<form align=\"center\" action=\"abc.php\" method=\"get\">";
				echo	"<table align=\"center\">";
				echo		"<tr align=\"left\">";
				echo			"<td>";
				echo				"Num.Empleado:";
				echo			"</td>";
				echo			"<td><input type=\"text\" name=\"clave\" size=\"8\" maxlength=\"8\"></td>";
				echo		"</tr>";
				/*echo		"<tr align=\"left\">";
				echo			"<td align=\"left\">";
				echo				"Nombre:";
				echo			"</td>";
				echo			"<td><input type=\"text\" name=\"nombre\" size=\"25\" $disabled></td>";
				echo		"</tr>";
				*/echo		"<tr>";
				echo			"<td></td>";
				

				echo			"<td align=\"center\">";
				//echo				"<input type=\"submit\" id=\"tamaño\" value=\"Consultar\">";
				echo				"<input type=\"submit\" id=\"tamaño\" value=\"Eliminar\">";
				echo 				"<input type=\"hidden\" name=\"accion\" value=\"realizar_baja\">";
				echo			"</td>";		
				echo		"</tr>";
				echo	"</table>";
				echo "</form>";
				exit();
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la baja.
			if ($_GET["accion"] == "realizar_baja")
			{
				include("pg.php");

				$id = $_GET["clave"];

				if(!$id)
				{
					echo'<script type="text/javascript"> alert("Favor de colocar el Numero del Empleado"); window.location.href="abc.php?accion=baja"; </script>';
				}
								
				baja($id);				
			}
		?>
	</body>
</html>