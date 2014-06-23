<?php

// Declaracion de la interfaz Bitacora
interface iBitacora {
	
	// Datos de la interfaz
	public $id_usuario;
	public $descripcion_accion;
	public $tipo_accion;
	public $fecha;
	
	// Declaracion de los metodos
	
	// ######  Registrar en bitacora  ######
	// $tipo_accion = Puede ser agregar, editar o eliminar.
	public function registrar_bitacora($$tipo_accion){
	}
	
	// Función auxiliar encargada de realizar la insercion en la base de datos
	// $id_usuario = ID del usuario que está usando la aplicación
	// $descripcion_accion = Descripcion de la actividad que se va a registrar en la base de datos
	// $fecha = Fecha en la que el usuario realizó la acción
	public function registrar_bitacora_aux($id_usuario,$descripcion_accion,$fecha){
	}
	
	// !!!!! La bitacora no tiene metodos para modificar o eliminar los registros en ella
	
}
?>
