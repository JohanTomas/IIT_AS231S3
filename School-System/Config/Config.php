<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

// Define database
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', ''); // Contraseña vacía si no hay contraseña configurada
define('dbname', 'sistema_escolar');  // Cambiar los backticks por comillas simples

// Connecting database
try {
    $connect = new PDO("mysql:host=".dbhost.";dbname=".dbname, dbuser, dbpass);
    $connect->query("set names utf8;");
    $connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>
