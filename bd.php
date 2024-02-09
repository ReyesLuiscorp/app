<?php

$servidor="localhost"; // 127.0.0.1
$baseDeDatos="app";
$usuario="root";
$contraseña="";

// act
try {
    $conexion= new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contraseña);
}catch(Exception $ex){
    echo $ex->getMessage();
}
?>