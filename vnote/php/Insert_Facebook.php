<?php
session_id('vNoteSession');
session_start();

$name = $HTTP_GET_VARS["nombre_facebook"];
$last_name = $HTTP_GET_VARS["apellido"];
$e_mail = $HTTP_GET_VARS["email"];

$con = mysql_connect("mysql5.000webhost.com", "a2472874_uvnote", "passvnote14");
if (!$con)
  {die('No puede conectar con MySQL: ' . mysql_error());} 

$mydb = mysql_select_db("a2472874_bdvnote");
if (!$mydb)
  {die('No puede conectar con la base de Datos: ' . mysql_error());} 
 
 //Se verifica si existe el usuario.
 $existe = mysql_query("SELECT id_usuario,nombre,apellido FROM usuario WHERE correo='$e_mail'");
 
 $sql = "SELECT id_usuario,nombre,apellido FROM usuario WHERE correo='$e_mail'";
 
 $result = mysql_query($sql);
 $fila = mysql_fetch_array($result); // Obtener los datos del usuario
  
 $nombre = $fila['nombre'];
 $apellido = $fila['apellido'];
 
 $nombre_completo = "$nombre $apellido";
 
 $_SESSION['id'] = $fila['id_usuario'];
 $_SESSION['nombre'] = $nombre_completo;
 header('Location: ../inicio.html');
  
if(mysql_num_rows($existe) == 1){

}else{
   //Se realiza el insert de la información del usuario.
  $dup = mysql_query("INSERT INTO usuario (nombre,apellido,correo) VALUES ('$name','$last_name','$e_mail')");
   header('Location: ../inicio.html');
}

mysql_close($con);
?> 
