<?php

//Definiendo variable de conexion
$db = new mysqli('localhost', 'root', '', 'sifv2');
$acentos = $db->query("SET NAMES 'utf8'");

//Servidor, usuario, password, DB//

if($db->connect_error < 0){
	die('No se puede conectar [' . $db->connect_error . ']');
}
?>	