<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    // Encriptar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, password, rol) 
            VALUES ('$nombre', '$email', '$hashed_password', '$rol')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario registrado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="styles.css">
    <title>Registro de Usuario</title>
   
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <label for="rol">Rol:</label>
        <select name="rol" required>
            <option value="cliente">Cliente</option>
            <option value="administrador">Administrador</option>
        </select><br>
        <button type="submit">Registrar</button>
    </form>
    <a href="index.php">REGRESAR A MENU</a>

</body>
</html>