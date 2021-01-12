<?php

//Cadena de Conexión
$conn_string = "host=10.41.246.68 port=5432 dbname=tienda.0950 user=syscontrolprogramacion password=f45459f3627a6d7372b261324aa4b574";

//Establecemos una conexion con el servidor postgresSQL
$dbconn = pg_connect($conn_string) or die('No se ha podido conectar:'.pg_last_error());

// Revisamos el estado de la conexion en caso de errores. 
if(!$dbconn) {
	echo "Error: No se ha podido conectar a la base de datos\n";
} else {
	echo "Conexión exitosa\n";
}
echo "<br />";



/*$result = pg_query($dbconn, "select * from CatalogoEmpleados");
if (!$result) {
	echo "Ocurrió un error.\n";
exit;
}

while ($row = pg_fetch_row($result)) {
  echo "NumEmpleado: $row[0]  Nombre: $row[1]";
  echo "<br />\n";
}*/

/*function borrarPersona($id)
{
	$sql = "DELETE FROM CatalogoEmpleados";
    // Si 'id' es diferente de 'null' sólo se borra la persona con el 'id' especificado:
    if( $id != null )
    $sql .= " WHERE NumEmpleado=".$id;
    // Ejecutamos la consulta (se devolverá true o false):
    return pg_query( $conexion, $sql );
}*/


echo "<font size='5'> Ejemplo 1</font>";
echo "<br />";
//Declaración de funciones
function mostrarTexto($texto) {
echo "<strong>El texto a mostrar es el siguiente: </strong>";
echo $texto;
}
//Manda llamar a l afunción mostrarTexto
mostrarTexto("Me gusta mucho la web de aprenderaprogramar.com");

echo "<br />";
echo "<font size='5'> Ejemplo 2</font>";
echo "<br />";
// Ejemplo funciones aprenderaprogramar.com
function operaciones($n1, $n2, $operacion) {
$resultado = 0;
if($operacion == "Sumar") {
$resultado = $n1 + $n2;
}else if($operacion == "Restar") {
$resultado = $n1 - $n2;
}else if($operacion == "Multiplicar") {
$resultado = $n1 * $n2;
}
return $resultado; // Devolver el resultado
}
//Llamar a la función operaciones
$r = operaciones(5, 7, "Sumar");
echo $r . "<br>";
// O podemos imprimir directamente
echo operaciones(15, 8, "Restar");

echo "<br />";
echo "<font size='5'> Ejemplo 3</font>";
echo "<br />";
//Ejemplo funciones aprenderaprogramar.com
function mostrarTextoError() {
echo "<strong>Se ha producido un error </strong>";
// Aquí pueden venir varias líneas de instrucciones
}
//Llamar a la función mostrarTextoError
mostrarTextoError();







//Cerramos la Coneión
pg_close($dbconn);

?>