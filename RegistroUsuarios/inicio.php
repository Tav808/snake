<?php
session_start();

if (isset($_GET['salir'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['usuario_logueado'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control - Truebuild</title>
</head>
<body>
    <h1>¡Bienvenido, <?php echo $_SESSION['usuario_logueado']; ?>!</h1>
    <p>Has entrado correctamente al sistema de la escuela.</p>
    <hr>
    <a href="inicio.php?salir=true">Cerrar Sesión (Salir)</a>
</body>
</html>