<?php
include('configdb.php');         // Se incluyen los datos para la conexion con la base de datos

// Clase utilizada para conectarse con la base de datos de la Aplicacion
class Conexion{
	
	// Constructor
	function Conexion(){
		$Conectar; 
	}
	
	// Se realiza la conexion con la base de datos
	function conectar() {
		$con = mysql_connect($dbhost,$dbuser,$dbpass);
		if(!($con = mysql_connect($dbhost,$dbuser,$dbpass))){
			echo "Error al conectar a la base de datos";	   // Se devuelve un mensaje de error si no se logra conectar
			exit();
		}else{
			mysql_select_db($dbname,$con);                     // Se selecciona la base de datos
			mysql_set_charset('utf8',$con)                     // Se designa el charset a UTF-8
			$Conectar = $con;
			return true;
			}		 
    }
}
?>
