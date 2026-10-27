<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Buscar al usuario por correo
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        // Verificar la contraseña (soporta texto plano o cifrada)
        if ($password === $usuario['password'] || password_verify($password, $usuario['password'])) {
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('El correo no está registrado'); window.history.back();</script>";
    }

    mysqli_close($conexion);
}
?>