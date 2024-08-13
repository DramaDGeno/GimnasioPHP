<?php
require('conexion.php');

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$password = $_POST['password'];
$edad = $_POST['edad'];
$rol = $_POST['rol'];
$status = $_POST['status'];


// Encriptar la contraseña
// $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Verificar si el correo ya está en la base de datos
$verificar = $mysqli->query("SELECT email FROM usuarios WHERE email = '$email'");

if ($verificar->num_rows > 0) {
    echo '<script>alert("El correo ya está registrado")</script>';
    echo "<script>location.href='index2.php'</script>"; // Cambia 'registro_usuario.php' a la página de registro correcta
} else {
    // Insertar el nuevo usuario
    $insertar = $mysqli->query("INSERT INTO `usuarios`(`nombre`, `apellidos`, `email`, `password`, `edad`, `rol`, `status`) VALUES ('$nombre', '$apellidos', '$email', '$password', '$edad', '$rol','$status')");
    
    if ($insertar) {
        $subject = "GYMaster";
    $carta = "Hola $nombre, tu solicitud fue atendida. \n";
    $carta .= "Tu correo es: $email \n";
    $carta .= "Tu contraseña es: $password \n";
    $carta .= "Que tengas un exelente día!";
    
    mail($email, $subject, $carta);
       
        echo '<script>alert("Usuario guardado exitosamente")</script>';
        echo "<script>location.href='index2.php'</script>";
    } else {
        echo "Error: " . $mysqli->error;
        echo "<script>location.href='index2.php'</script>"; // Cambia 'registro_usuario.php' a la página de registro correcta
    }
}

$verificar->close();
$mysqli->close();
?>
