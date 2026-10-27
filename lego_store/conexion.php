<?php
$host = "localhost";
$usuario = "root";
$password = "";
$database = "tienda_lego";

$conexion = new mysqli($host, $usuario, $password, $database);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos MySQL: " . $conexion->connect_error);
}
?>