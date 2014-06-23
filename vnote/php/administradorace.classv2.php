<?php

// Se incluyen los archivos con las clases a utilizar
include('evento.class.php');              // Evento

// Clase encargada de mapear las funcionalidades con las clases respectivas 
class AdministradorACE(){
	
	function AdministradorACE(){
		$instancia;
	}
	
	// Funciones de Evento
	
	
	function AgregarEvento(){
		$instancia->agregar($nombre,$descripcion,$prioridad,$fecha);                                         // Se agrega el nuevo evento		
	}
	
	function ModificarEvento(){
		$evento=htmlspecialchars(trim($_POST['id_evento']));
		$Nuevo_nombre=htmlspecialchars(trim($_POST['inputNombre']));
		$Nueva_descripcion=htmlspecialchars(trim($_POST['inputDescripcion']));
		$Nueva_prioridad=htmlspecialchars(trim($_POST['inputPrioridad']));
		$Nueva_fecha=htmlspecialchars(trim($_POST['inputFecha']));
			
		$instancia->modificar($evento,$Nuevo_nombre,$Nueva_descripcion,$Nueva_prioridad,$Nueva_fecha);       // Se edita el evento deseado		
	}
	
	function EliminarEvento(){
		$evento=htmlspecialchars(trim($_POST['id_evento']));
		$instancia->eliminar($evento);		  // Se elimina el evento con el ID ingresado
	}
	
	// Funciones de Apunte
	
	function AgregarApunte(){
		$instancia->agregar($nombre,$tema,$prioridad,$fecha,$descripcion_apunte);                                          // Se agrega el nuevo apunte		
	}
	
	function ModificarApunte(){
		$apunte=htmlspecialchars(trim($_POST['id_apunte']));
		$Nuevo_tema=htmlspecialchars(trim($_POST['inputTema']));
		$Nueva_prioridad=htmlspecialchars(trim($_POST['inputPrioridad']));
		$Nueva_fecha=htmlspecialchars(trim($_POST['inputFecha']));
		$Nueva_descripcion_apunte=htmlspecialchars(trim($_POST['inputDescripcion']));
			
		$instancia->modificar($apunte,$Nuevo_tema,$Nueva_prioridad,$Nueva_fecha,$Nueva_descripcion_apunte);  // Se modificar el apunte deseado		
	}
	
	function EliminarApunte(){
		$apunte=htmlspecialchars(trim($_POST['id_apunte']));
		$instancia->eliminar($apunte);		  // Se elimina el apunte con el ID ingresado
	}
	
	// Funciones de Contacto
	
	function AgregarContacto(){
		$Nombre=htmlspecialchars(trim($_POST['inputNombre']));
		$Apellido=htmlspecialchars(trim($_POST['inputApellido']));
		$Correo=htmlspecialchars(trim($_POST['inputCorreo']));
		$Tel_casa=htmlspecialchars(trim($_POST['inputTel_casa']));
		$Celular=htmlspecialchars(trim($_POST['inputCelular']));
		$Direccion=htmlspecialchars(trim($_POST['inputDireccion']));
		$Ciudad=htmlspecialchars(trim($_POST['inputCiudad']));
		$Pais=htmlspecialchars(trim($_POST['inputPais']));
			
		$instancia->agregar($Nombre,$Apellido,$Correo,$Tel_casa,$Celular,$Direccion,$Ciudad,$Pais);     // Se agrega el nuevo contacto		
	}
	
	function ModificarContacto(){
		$contacto=htmlspecialchars(trim($_POST['id_contacto']));
		$Nuevo_nombre=htmlspecialchars(trim($_POST['inputNombre']));
		$Nuevo_apellido=htmlspecialchars(trim($_POST['inputApellido']));
		$Nuevo_correo=htmlspecialchars(trim($_POST['inputCorreo']));
		$Nuevo_tel_casa=htmlspecialchars(trim($_POST['inputTel_casa']));
		$Nuevo_celular=htmlspecialchars(trim($_POST['inputCelular']));
		$Nuevo_direccion=htmlspecialchars(trim($_POST['inputDireccion']));
		$Nuevo_ciudad=htmlspecialchars(trim($_POST['inputCiudad']));
		$Nuevo_pais=htmlspecialchars(trim($_POST['inputPais']));
			
		$instancia->modificar($contacto,$Nuevo_nombre,$Nuevo_apellido,$Nuevo_correo,$Nuevo_tel_casa,$Nuevo_celular,$Nuevo_direccion,$Nuevo_ciudad,$Nuevo_pais);  // Se edita el contacto deseado		
	}
	
	function EliminarContacto(){
		$contacto=htmlspecialchars(trim($_POST['id_contacto']));
		$instancia->eliminar($contacto);                                          // Se elimina el contacto con el ID ingresado
	}	
		
}
?>
