<?php session_start();
session_unset();     // Se desasignan las variables de la sesión
session_destroy();   // Se destruye/cierra la sesión
header("Location:../login/login.html"); // Se redirecciona al usuario a la página de Login
?>
