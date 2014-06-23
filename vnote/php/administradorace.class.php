<?php

// Se incluyen los archivos con las clases a utilizar
include('evento.class.php');              // Evento

// Variables obtenidas del usuario
$accion = $_POST['accion'];
$objeto = $_POST['objeto'];
$evento = $_POST['id_evento'];
$apunte = $_POST['id_apunte'];
$contacto = $_POST['id_contacto'];


// Clase encargada de mapear las funcionalidades con las clases respectivas 
class AdministradorACE(){
	
	function AdministradorACE(){
		$instancia;
	}
	
	if ($objeto == 'evento'){
		// Se crea una instancia de Evento
		$instancia = new Evento();
		if($accion == 'agregar'){
			$instancia->agregar($nombre,$descripcion,$prioridad,$fecha);                                         // Se agrega el nuevo evento
		}
		elseif($accion == 'modificar'){                                      
			$Nuevo_nombre=htmlspecialchars(trim($_POST['inputNombre']));
			$Nueva_descripcion=htmlspecialchars(trim($_POST['inputDescripcion']));
			$Nueva_prioridad=htmlspecialchars(trim($_POST['inputPrioridad']));
			$Nueva_fecha=htmlspecialchars(trim($_POST['inputFecha']));
			
			$instancia->modificar($evento,$Nuevo_nombre,$Nueva_descripcion,$Nueva_prioridad,$Nueva_fecha);       // Se edita el evento deseado
		}
		else{
			$instancia->eliminar($evento);                                                                       // Se elimina el evento con el ID ingresado
			}
	} //  /.if objeto == 'evento'		
	elseif($objeto == 'apunte'){
		// Se crea una instancia de Apunte
		$instancia = new Apunte();
		if($accion == 'agregar'){
			$instancia->agregar($nombre,$descripcion,$prioridad,$fecha);                                         // Se agrega el nuevo apunte
		}
		elseif($accion == 'modificar'){                                      
			$Nuevo_tema=htmlspecialchars(trim($_POST['inputTema']));
			$Nueva_prioridad=htmlspecialchars(trim($_POST['inputPrioridad']));
			$Nueva_fecha=htmlspecialchars(trim($_POST['inputFecha']));
			$Nueva_descripcion_apunte=htmlspecialchars(trim($_POST['inputDescripcion']));
			
			$instancia->modificar($apunte,$Nuevo_tema,$Nueva_prioridad,$Nueva_fecha,$Nueva_descripcion_apunte);  // Se modificar el apunte deseado
		}
		else{
			$instancia->eliminar($apunte);                                                                       // Se elimina el apunte con el ID ingresado
			}
	} //  /.elseif objeto == 'apunte'
	else{ // if objeto == 'contacto'
		// Se crea una instancia de Contacto
		$instancia = new Contacto();
		if($accion == 'agregar'){
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
		elseif($accion == 'modificar'){                                      
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
		else{
			$instancia->eliminar($contacto);                                                                // Se elimina el contacto con el ID ingresado
			}
	} //  /.else objeto == 'contacto'
}
?>
