<?php
include('conexion.php');                 // Se incluye el archivo con la conexion con la base de datos

$id_usuario = $_SESSION['id'];

// Funcion que llama a las funciones para la carga de datos que tiene el usuario para mostrarlos en la pagina de Inicio
function cargarValoresIniciales(){
	cargarApuntes();
	cargarEventos();
	cargarContactos();
	cargarArchivos();	
}
 // Funciones para cargar la cantidad de cada uno de los elementos
function cargarApuntes(){
	$conexion = new Conexion();
	
	if($conexion->conectar()==true){
		$result = mysql_query("SELECT count(*) FROM Apunte WHERE id_usuario='".$id_usuario."'"); // Se procede a obtener la cantidad de apuntes
		$row = mysql_fetch_row($result);
		$_SESSION['cant_apuntes'] = $row;
	}else{
		echo 'Error a la hora de obtener la cantidad de Apuntes'
		}
}
	
function cargarEventos(){
	$conexion = new Conexion();
	
	if($conexion->conectar()==true){
		$result = mysql_query("SELECT count(*) FROM Evento WHERE id_usuario='".$id_usuario."'"); // Se procede a obtener la cantidad de eventos
		$row = mysql_fetch_row($result);
		$_SESSION['cant_eventos'] = $row;
	}else{
		echo 'Error a la hora de obtener la cantidad de Eventos'
		}
	}

function cargarContactos(){
	$conexion = new Conexion();
	
	if($conexion->conectar()==true){
		$result = mysql_query("SELECT count(*) FROM Contacto WHERE id_usuario='".$id_usuario."'"); // Se procede a obtener los datos del evento
		$row = mysql_fetch_row($result);
		$_SESSION['cant_contactos'] = $row;
	}else{
		echo 'Error a la hora de obtener la cantidad de Contactos'
		}
	}

function cargarArchivos(){
	$conexion = new Conexion();
	
	if($conexion->conectar()==true){
		$result = mysql_query("SELECT count(*) FROM Archivo WHERE id_usuario='".$id_usuario."'"); // Se procede a obtener los datos del evento
		$row = mysql_fetch_row($result);
		$_SESSION['cant_archivos'] = $row;
	}else{
		echo 'Error a la hora de obtener la cantidad de Archivos'
		}
	}	
?>
