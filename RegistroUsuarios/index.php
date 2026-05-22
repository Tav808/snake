<?php
session_start();
include 'conexion.php';
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailU = $_POST['emailU'] ?? '';
    $contrasenaU = $_POST['contrasenaU'] ?? '';

    $sql = "SELECT * FROM usuarios WHERE emailU = '$emailU' AND contrasenaU = '$contrasenaU'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION['usuario_logueado'] = $emailU; 
        header("Location: inicio.php"); 
        exit();
    } else {
        $mensaje = "Email o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Truebuild</title>
</head>
<body>
    <h2>Iniciar Sesión - Truebuild</h2>
    
    <p style="color: red;"><b><?php echo $mensaje; ?></b></p>

    <form method="POST" action="index.php">
        <label>Email:</label><br>
        <input type="email" name="emailU" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="contrasenaU" required><br><br>

        <button type="submit">Entrar al Sistema</button>
    </form>
    <br>
    <a href="registro.php">¿No tienes cuenta? Regístrate aquí</a>
</body>
</html>