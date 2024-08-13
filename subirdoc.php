<?php 

$id_usuario=$_POST['id_usuario'];
$nombre_doc=$_POST['nombre_doc'];
$url_doc=$_POST['url_doc'];
$comentarios=$_POST['comentarios'];
$status =$_POST['status'];

$dir_prueba= '\ ';

$url_doc= basename($_FILES['url_doc']['name']);

$dir_subida ='documentos/';
$fichero_subido = $dir_subida . basename($_FILES['url_doc']['name']);

move_uploaded_file($_FILES['url_doc']['tmp_name'], $fichero_subido);

require("conexion.php");
$mysqli->query("INSERT INTO documentos VALUES('','$id_usuario','$nombre_doc','$url_doc','$comentarios','1')");
echo 'se ha registrado con exito';
echo '<script language="javascript">alert("archivo registrado con exito");</script> ';
echo"<script>location.href='index3.php'</script>";