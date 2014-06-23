<?php
include('../vnote/php/conexion.php');            // Se incluye el archivo con la conexion a la base de datos

require_once 'login.class.php';
//Accedemos al método singleton que es quién crea la instancia
//de nuestra clase y así podemos acceder sin necesidad de
//crear nuevas instancias, lo que ahorra consumo de recursos
$nuevoSingleton = Login::singleton_login();

 // Accion que identifica la funcion que se va a ejecutar

// El id_usuario es incremental por lo que no se ingresa manualmente
$usuario = $_POST['inputUsuario'];
$nombre = $_POST['inputNombre'];
$correo = $_POST['inputCorreo'];
$contrasena = $_POST['inputPassword'];

// ID del usuario de la sesion
$id = $_SESSION['id'];

// Verificar si se debe de Cerrar la sesión
if ($_GET['cerrar_sesion'] == '1'){
	Cerrar_sesion();
	}

// Switch para verificar que funcion se debe de ejecutar
if (isset($_POST['accion'])){
	switch($_POST['accion']){
		case 'iniciar_sesion':
		Iniciar_sesion();
		break;
		
		case 'registrarse':
		Registrarse();
		break;
		
		case 'modificar':
		ModificarCuenta();
		break;
	}
	
}

// Clase que describe el comportamiento de un usuario a la hora de registrarse en el sistema
class Usuario{
	
	// Constructor
	function Usuario(){
	}
	
	// Funcion para verificar si existe el usuario
	function Existe(){
		$conexion = new Conexion();
		if($conexion->conectar()==true){             // El id del evento es el unico valor que no se agrega por ser incremental
			$sql = "SELECT id_usuario FROM Usuario WHERE nombre='".$usuario."'";    // Se construye la consulta SQL
			$existe = mysql_num_rows($sql);                       // Se ejecuta la consulta
			if($existe == 1){
				return true;           // Si existe
			}
			else{
				return false;          // No existe
				}
			echo "0";
		}else{			
			echo "1";           // Se presentó un error
			}
		
		}
	
	// Funcion para registrar un nuevo usuario en la aplicacion
	function Registrarse(){
		$verificar = Existe();
		if($verificar == true){
			echo "1";
		}
		else{
			$conexion = new Conexion();
			if($conexion->conectar()==true){             // El id del evento es el unico valor que no se agrega por ser incremental
				$sql = "INSERT INTO Usuario(usuario,nombre,correo,contrasena) VALUES ('".$usuario."','".$nombre."','".$correo."','".$contrasena."')";    // Se construye la consulta SQL
				mysql_query($sql);                       // Se ejecuta la consulta
				echo "0";           // Se registró exitosamente
			}else{
				echo "3";           // Se presentó un error
				}		
	}
	
	function Iniciar_sesion(){
		if(isset($_POST['username']))
		{
			$nick = $_POST['inputUsuario'];
			$password = $_POST['inputPassword'];
			
			//Accedemos al método usuarios y los mostramos
			$usuario = $nuevoSingleton->login_users($nick,$password);
			
			//Redireccionamos a la página de Inicio
			if($usuario == TRUE)
			{
				header("Location:../vnote/inicio.html");
			}
		}
	} // ./Iniciar_sesion
	
	// Funcion para cerrar sesion en el sistema
	function Cerrar_sesion(){
		session_start();
		session_unset();     // Se desasignan las variables de la sesión
		session_destroy();   // Se destruye/cierra la sesión
		header("Location:../login/login.html"); // Se redirecciona al usuario a la página de Login
	}
	
	// Funcion para cambiar datos del usuario. Lo unico que no se puede modificar es el Usuario
	function ModificarCuenta(){
		$conexion = new Conexion();
		if($conexion->conectar()==true){             // El id del evento es el unico valor que no se agrega por ser incremental
			$sql = "UPDATE Usuario SET nombre= ";    // Se construye la consulta SQL
			mysql_query($sql);                       // Se ejecuta la consulta
			echo "0";           // Se registró exitosamente
		}else{
			echo "1";           // Se presentó un error
			}
	}
	
	// Funcion para cargar los datos de la cuenta del usuario en los inputs.
	function CargarDatosCuenta(){
		$datos_usuario = array();
		$conexion = new Conexion();
		if($conexion->conectar()==true){                       
			$sql = "SELECT usuario,nombre,correo,contrasena FROM Usuario WHERE id_usuario='$id'";      // Se construye la consulta SQL
			$result = mysql_query($sql);                     // Se ejecuta la consulta
			$row = mysql_fetch_array($result);               // Datos obtenidos
			$datos_usuario[]=$row['usuario'];
			$datos_usuario[]=$row['nombre'];
			$datos_usuario[]=$row['correo'];
			$datos_usuario[]=$row['contrasena'];
			return $datos_usuario                            // Se devuelve una lista con los datos del usuario
			
		}else{
			echo "Error al cargar sus datos"
			}
		
	}
	
	
}
?>
