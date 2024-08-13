<?php
session_start();
if(@!$_SESSION['email']){
	header("location:login.html");
}
$nombre = $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>MOSTRAR</title>
	
</head>
<body>


<table>
 <tr>
 
<th>ID DOCUMENTO</th> 	
<th>ID USUARIO</th>
<th>NOMBRE DEL DOCUMENTO</th>
<th>URL</th>
<th>COMENTARIOS</th>
<th>STATUS</th>

<th>Eliminar</th>

 </tr>
	<?php
	$mysqli=new mysqli("localhost","u862678554_fiorela","Fiorela2005*","u862678554_gimnasio");
	if($mysqli->connect_errno) 
{
	echo "algo salio mal al conectar con la base de datos:(".mysqli->connect_errno.")".$mysqli->connect_error;
}
//$id_usuario = $_POST['id_usuario'];


	//SENTENCIA SQL PARA BUSCAR REGISTROS DE LAS TABLAS
	$sql = $mysqli ->query("SELECT documentos.id_doc, usuarios.nombre, documentos.nombre_doc, documentos.url_doc, documentos.comentarios, documentos.status
	FROM documentos
	JOIN usuarios ON documentos.id_usuario = usuarios.id_usuario");
	while($datos = mysqli_fetch_array($sql)){


?>
<tr>
	<td><?php echo $datos[0]; ?></td>
	<td><?php echo $datos[1]; ?></td>
	<td><?php echo $datos[2]; ?></td>
	<td><?php echo $datos[3]; ?></td>
	<td><?php echo $datos[4]; ?></td>
	<td><?php echo $datos[5]; ?></td>
	
	
</tr>

<?php
}

?>


</table>
</body>
</html>

