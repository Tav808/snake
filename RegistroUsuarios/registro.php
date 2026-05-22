<?php
include 'conexion.php';
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreU = $_POST['nombreU'] ?? '';
    $apellidoU = $_POST['apellidoU'] ?? '';
    $emailU = $_POST['emailU'] ?? '';
    $contrasenaU = $_POST['contrasenaU'] ?? '';

    if ($nombreU === '' || $apellidoU === '' || $emailU === '' || $contrasenaU === '') {
        $mensaje = "Rellena todos los campos.";
    } else {
        $nombreE = $conexion->real_escape_string($nombreU);
        $apellidoE = $conexion->real_escape_string($apellidoU);
        $emailE = $conexion->real_escape_string($emailU);
        $contrasenaE = $conexion->real_escape_string($contrasenaU);

        $sql = "INSERT INTO usuarios (nombreU, apellidoU, emailU, contrasenaU) VALUES ('$nombreE', '$apellidoE', '$emailE', '$contrasenaE')";
        
        if ($conexion->query($sql) === TRUE) {
            $mensaje = "¡Registro exitoso! Ahora puedes loguearte.";
        } else {
            $mensaje = "Error al registrar. Quizás el email ya existe.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Truebuild</title>
</head>
<body>
    <h2>Crear Cuenta Nueva</h2>
    
    <p style="color: green;"><b><?php echo $mensaje; ?></b></p>

    <form method="POST" action="registro.php">
        <label>Nombre:</label><br>
        <input type="text" name="nombreU" required><br><br>
        
        <label>Apellido:</label><br>
        <input type="text" name="apellidoU" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="emailU" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="contrasenaU" required><br><br>

        <button type="submit">Crear Usuario</button>
    </form>
    <br>
    <a href="index.php">Volver al Login</a>
</body>
</html>