<?php 
// conexion a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'tienda_sena');
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}
?>