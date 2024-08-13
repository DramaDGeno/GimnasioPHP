<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    require("conexion.php");

    if ($stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = '$email'")) {
        $stmt->execute();
        $result = $stmt->get_result();

        if ($dato = $result->fetch_array(MYSQLI_ASSOC)) {
            if ($password == $dato['password']) {

				$_SESSION['id_usuario'] = $dato['id_usuario'];
                $_SESSION['nombre'] = $dato['nombre'];
                $_SESSION['apellidos'] = $dato['apellidos'];
                $_SESSION['email'] = $dato['email'];
                $_SESSION['password'] = $dato['password'];
                 $_SESSION['edad'] = $dato['edad'];
                $_SESSION['rol'] = $dato['rol'];

                echo '<script>alert("Bienvenido al Menú Principal")</script>';
                echo "<script>location.href='index1.php'</script>";
            } else {
                echo '<script>alert("La contraseña que ingresaste es incorrecta")</script>';
                echo "<script>location.href='login.html'</script>";
            }
        } else {
            echo '<script>alert("El usuario que ingresaste es incorrecto")</script>';
            echo "<script>location.href='login.html'</script>";
        }

        $stmt->close();
    } else {
        echo '<script>alert("Error al conectar con la base de datos")</script>';
        echo "<script>location.href='login.html'</script>";
    }

    $mysqli->close();
} else {
    header("location:login.html");
    exit();
}
?>