<?php


 //$mysqli=b¿new mysqli("Nombre_servidor","Usuario_baseD","Contraseña","Nombrebase_datos");
 $mysqli=new mysqli("localhost","u862678554_fiorela","Fiorela2005*","u862678554_gimnasio");
 if($mysqli->connect_errno)
{
     echo "Algo salio mal al conectar con la base de datos:(".$mysqli->connect_errno.")"
        .$mysqli->connect_error;
}

$id_doc=$_GET['id_doc'];

$sql = $mysqli->query("DELETE FROM documentos WHERE id_doc='$id_doc'");

if($sql){

    echo '<script>alert("Cliente de Baja")</script>';
    echo "<script>location.href='index4.php'</script>";

}

else{
   echo '<script>alert("Error, Ciente permanece en alta")</script>';
   echo "<script>location.href='index4.php'</script>";
}
?>