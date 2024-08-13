<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit;
}

// Conectar con la base de datos
$mysqli = new mysqli("localhost", "u862678554_fiorela", "Fiorela2005*", "u862678554_gimnasio");

if ($mysqli->connect_errno) {
    echo "Error al conectar con la base de datos: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit;
}

$id_usuario = $_GET['id_usuario'] ?? '';

if ($id_usuario) {
    // Cargar datos actuales del usuario
    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "No se encontró el usuario.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $edad = $_POST['edad'];
    $rol = $_POST['rol'];
    $status= $_POST['status'];
    
$modifica = $mysqli->query("UPDATE usuarios SET nombre = '$nombre', apellidos='$apellidos',email = '$email' password='$password', edad = '$edad', rol = '$rol', status = '$status' WHERE id_usuario = '$id_usuario'");

    if ($modifica->execute()) {
        echo '<script>alert("Usuario Modificado Correctamente")</script>';
        echo "<script>location.href='consultar.php'</script>";
    } else {
        echo '<script>alert("Error, no se pudo modificar el usuario")</script>';
        echo "<script>location.href='consultar.php'</script>";
    }

    $stmt->close();
}

$mysqli->close();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Modificar Usuario</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="is-preload">
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <header id="header">
                    <h2>Modificar Usuario</h2>
                </header>
                <?php if (isset($usuario)) { ?>
               <form method="POST" action="">
    <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($usuario['id_usuario']); ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
    <br>
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" id="apellidos" value="<?php echo htmlspecialchars($usuario['apellidos']); ?>" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($usuario['password']); ?>" required>
    <br>
    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad" value="<?php echo htmlspecialchars($usuario['edad']); ?>" required>
    <br>
    <label for="rol">Rol:</label>
    <select name="rol" id="rol" required>
        <option value="usuario" <?php if ($usuario['rol'] == 'usuario') echo 'selected'; ?>>Usuario</option>
        <option value="administrador" <?php if ($usuario['rol'] == 'administrador') echo 'selected'; ?>>Administrador</option>
    </select>
    <br>
    <label for="password">Estatus:</label>
    <input type="text" name="status" id="password" value="<?php echo htmlspecialchars($usuario['status']); ?>" required>
    <input type="submit" value="Modificar">
</form>

                <?php } else { ?>
                <p>No se encontró el usuario.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
