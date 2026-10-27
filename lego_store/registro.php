<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['usuario_id'] = $stmt->insert_id;
        $_SESSION['usuario_nombre'] = $nombre;
        
        // Al registrarse, entra directo a la tienda
        header("Location: index.php");
        exit();
    } else {
        echo "<script>
                alert('Error al registrar: Este correo electrónico ya existe.');
                window.history.back();
              </script>";
    }

    $stmt->close();
    $conexion->close();
}
?>