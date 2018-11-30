<?php
class Empleado
{
	private $idempleado;
	private $nombre;
	private $documento;
	private $direccion;
	private $telefono;
	private $email;
	private $didtipoempleado;
	private $password;
	private $rol;
		//estas son las variables de conexion co
	
	
		

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>