<?php 

require('conexion.php')


$nombre=$_POST['nombre'];
$id_usuario=$_POST['id_usuario'];
$apellidos=$_POST['apellidos'];
$email=$_POST['email'];
$password=$_POST['password'];
$edad=$_POST['edad'];
$rol=$_POST['rol'];
zcs

$modifica=$mysqli->query("UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',email='$email',password='$password',edad='$edad',rol='$rol' WHERE id_usuario='$id_usuario'");

if($modifica) {
    echo'<script>alert("Registro exitoso")</script>';
    echo"<script>location.href='index5.php'</script>";

}

else{
        echo'<script>alert("Error al actualizar al alumno")</script>';
    echo"<script>location.href='index5.php'</script>";

}


 ?>