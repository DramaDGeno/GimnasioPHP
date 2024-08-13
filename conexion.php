<?php
$mysqli=new mysqli("localhost", "u862678554_fiorela", "Fiorela2005*", "u862678554_gimnasio");
if($mysqli->connect_errno)
{
echo "Algo salio mal al conectar con la base de datos:(".$mysqli->connect_errno.")".$mysqli->connect_error;
}
?>