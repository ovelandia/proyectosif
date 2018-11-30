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
		//estas son las variables de conexion con aprendiz
	private $idtipoempleado;
	private $cargo;
		

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>