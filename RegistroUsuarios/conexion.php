<?php
$conexion = new mysqli("localhost", "root", "", "truebuild");

if ($conexion->connect_error) {
    die("Error conectando a la base de datos.");
}
?>