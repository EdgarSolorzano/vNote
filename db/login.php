<?php
require_once 'login.class.php';
//Accedemos al método singleton que es quién crea la instancia
//de nuestra clase y así podemos acceder sin necesidad de
//crear nuevas instancias, lo que ahorra consumo de recursos
$nuevoSingleton = Login::singleton_login();

if(isset($_POST['inputUsername']))
{
	$nick = $_POST['inputUsername'];
	$password = $_POST['inputPassword'];
	//Accedemos al método usuarios y los mostramos
	$usuario = $nuevoSingleton->login_users($nick,$password);
	
	//Redireccionamos a la página de Inicio
	if($usuario == TRUE)
	{
		header("Location:../vnote/inicio.html");
	}
}
?>
