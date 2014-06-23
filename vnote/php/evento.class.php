<?php
include('conexion.php');                 // Se incluye el archivo con la conexion con la base de datos
include('bitacora.interface.php');       // Se incluye el archivo con la interfaz iBitacora

// Clase encargada del manejo de los Eventos de los usuarios
class Evento implements iBitacora{
	
	// Variables de clase
	private $Id;                 // ID para identificar al evento
	private $Usuario;            // ID del usuario propietario del evento
	private $Nombre;             // Nombre del evento
	private $Descripcion;        // Descripcion del evento
	private $Prioridad;          // Prioridad del evento
	private $Fecha;              // Fecha designada al evento
	
	this->Usuario = $_SESSION['id'];  // Se asigna el ID del usuario logueado en la aplicacion a la variable Usuario
		
	// Constructor de la clase
	function Evento(){
	}
		
	// ## Funcion utilizada para asignar los datos de un evento a las variables de la clase
	function asignarDatos($id_evento){
		$conexion = new Conexion();
		if($conexion->conectar()==true){
			$result = mysql_query("SELECT * FROM Evento WHERE id_evento=".$id_evento);     // Se procede a obtener los datos del evento
			$row = mysql_fetch_array($result);
			this->Id = $id_evento;
			this->Nombre=$row['nombre'];
			this->Descripcion=$row['descripcion'];
			this->Prioridad=$row['prioridad'];
			this->Fecha=$row['fecha'];
			return true;
		}else{
			return false;
			}		
	}
	
	// ####### Funciones para obtener el valor de las variables
	
	function getID(){
		return this->Id;		
	}
	
	function getUsuario(){
		return this->Usuario;		
	}	
	
	function getNombre(){
		return this->Nombre;		
	}
	
	function getDescripcion(){
		return this->Descripcion;		
	}
	
	function getFecha(){
		return this->Fecha;		
	}
	
	function getPrioridad(){
		return this->Prioridad;		
	}
	
	// # @@@@@@  Funciones de funcionalidades principales - Reciben el id del evento.  @@@@@@
	
	// ###### Agregar un evento
	
	function agregar($nombre,$descripcion,$prioridad,$fecha){
		$usuario = Evento::getUsuario();
		$conexion = new Conexion();
		if($conexion->conectar()==true){             // El id del evento es el unico valor que no se agrega por ser incremental
			$sql = "INSERT INTO Evento(id_usuario,nombre,descripcion,prioridad,fecha) VALUES ('".$usuario."','".$nombre."','".$descripcion."','".$prioridad."','".$fecha."')";    // Se construye la consulta SQL
			mysql_query($sql);                       // Se ejecuta la consulta
			// Se asignan manualmente las variables necesarias para registrar en bitacora por desconocer el ID del evento recien agregado
			Evento->nombre = $nombre;
			Evento->fecha = $fecha;
			registrar_bitacora('agregar');           // Se llama a la funcion para registrar en bitacora
			echo "0";   // Se devuelve 0 en caso de tener exito
		}else{
			echo "1";   // Se devuelve 1 en caso de ocurrir un error
			}							
	}-
	
	// ###### Editar un evento
	
	function modificar($id_evento,$Nuevo_nombre,$Nueva_descripcion,$Nueva_prioridad,$Nueva_fecha){
				
		$conexion = new Conexion();
		if($conexion->conectar()==true){
			$sql = "UPDATE Evento SET nombre='".$Nuevo_nombre."',descripcion='".$Nueva_descripcion."',prioridad='".$Nueva_prioridad."',fecha='".$Nueva_fecha."' WHERE id_evento='".$id_evento."'";
			mysql_query($sql);       // Se ejecuta la consulta
			registrar_bitacora('editar');
	        echo "0";   // Se devuelve 0 en caso de tener exito
		}else{
			echo "1";   // Se devuelve 1 en caso de ocurrir un error
			}							
	}
	
	// ###### Eliminar un evento
	
	function eliminar($id_evento){
		$usuario = this->Usuario;
		$conexion = new Conexion();
		if($conexion->conectar()==true){
			return mysql_query("DELETE FROM Evento WHERE id_evento=".$id_evento." and id_usuario=".$usuario); // Se procede a eliminar el evento
			registrar_bitacora('eliminar');
			echo "0";   // Se devuelve 0 en caso de tener exito
			}else{
				echo "1";   // Se devuelve 1 en caso de ocurrir un error
				}					
	}
	
	// # %%%%%% Actualizar la bitacora %%%%%%
	// Se ejecutan las consultas dependiendo de la accion realizada y se retorna 0 en caso de exito o 1 en caso de error.
	// $descripcion_accion : Contiene la descripcion de lo que va a guardarse en bitacora, es lo que el usuario va a ver como su Actividad en el sistema.
	
	public function registrar_bitacora($tipo_accion){
		// Se asignan las variables de la clase a las variables locales a utilizar
		$elemento = Evento::getNombre();
		$id_usuario = Evento::getUsuario();
		$fecha = Evento::getFecha();
		
		// Se evalua el tipo de accion realizada		
		if ($tipo_accion == "agregar"){
			// Construir la descripcion a almacenar en bitacora
			$descripcion_accion = "El evento ".$elemento." fue agregado a su lista de eventos el ".$fecha;
			// Ejecutar la insercion
			registrar_bitacora_aux($id_usuario,$descripcion_accion,$fecha);
			}
			elseif ($tipo_accion == "editar"){
				// Construir la descripcion a almacenar en bitacora
				$descripcion_accion = "El evento ".$elemento." fue modificado el ".$fecha;
				// Ejecutar la insercion
				registrar_bitacora_aux($id_usuario,$descripcion_accion,$fecha);
				}
				else{ // Accion = eliminar
					// Construir la descripcion a almacenar en bitacora
					$descripcion_accion = "El evento ".$elemento." fue eliminado de su lista de eventos el ".$fecha;
					// Ejecutar la insercion
					registrar_bitacora_aux($id_usuario,$descripcion_accion,$fecha);
				}
	}
	
	// Funcion auxiliar encargada de realizar la insercion deseada en la tabla Bitacora
	public function registrar_bitacora_aux($id_usuario,$descripcion_accion,$fecha){
		$conexion = new Conexion();
		if($conexion->conectar()==true){             // El id del evento es el unico valor que no se agrega por ser incremental
			$sql = "INSERT INTO Bitacora(id_usuario,descripcion_accion,fecha) VALUES ('$id_usuario','$descripcion_accion','$fecha')";    // Se construye la consulta SQL
			mysql_query($sql);                       // Se ejecuta la consulta
			echo "0";   // Se devuelve 0 en caso de tener exito
		}else{
			echo "1";   // Se devuelve 1 en caso de ocurrir un error
			}				
	}
						
}
?>
