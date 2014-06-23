<?php

// Informacion sobre los parametros de la Base de Datos

$dbhost = 'mysql5.000webhost.com';       // Direccion del servidor
$dbname = 'a2472874_bdvnote';            // Nombre de la base de datos
$dbuser = 'a2472874_uvnote';             // Usuario de la base de datos
$dbpass = 'passvnote14';                 // Contraseña

class Conexion
{
    private static $instancia;
    private $dbh;
 
    private function __construct()
    {
        try {
 
            $this->dbh = new PDO('mysql:host=mysql5.000webhost.com;dbname=a2472874_bdvnote', 'a2472874_uvnote', 'passvnote14');
            $this->dbh->exec("SET CHARACTER SET utf8");
 
        } catch (PDOException $e) {
 
            print "Error!: " . $e->getMessage();
 
            die();
        }
    }
 
    public function prepare($sql)
    {
 
        return $this->dbh->prepare($sql);
 
    }
 
    public static function singleton_conexion()
    {
 
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
 
        }
 
        return self::$instancia;
        
    }
 
 
     // Evita que el objeto se pueda clonar
    public function __clone()
    {
 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
 
    }
}
?>
