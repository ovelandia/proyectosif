<?php
$db = new mysqli('localhost', 'root', '', 'sif');
$acentos = $db->query("SET NAMES 'utf8'");

//Servidor, usuario, password, DB

if($db->connect_error < 0){
	die('No se puede conectar [' . $db->connect_error . ']');
}
?>