<?php
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
    	//return $dbconn
    	echo "Conexión exitosa\n";
    }
?>


<?php
$contraseña = "";
$usuario = "postgres";
$nombre_base_de_datos = "unica";
try{
	$base_de_datos = new PDO('psgql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>