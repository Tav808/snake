<?php

$host = 'localhost';
$user = 'root';
$pass = 'usbw';
$db   = 'truebuild';
$port = 3307;

$conn = new mysqli($host, $user, $pass, $db, 3307);

if ($conn->connect_error) {
    die(json_encode([
        'success' => false,
        'message' => 'Error de conexión a la base de datos.'
    ]));
}

$conn->set_charset('utf8mb4');
?>
