<?php
class Empleado
{
	private $idempleado;
	private $nombre_emp;
	private $apellido_emp;
	private $documento;
	private $correo;
	private $telefono;
	private $rol;
	private $direccion;
	private $password;
	private $fk_genero;
	private $idgenero;
	private $idtipodocumento;
	private $fk_tipodocumento;
	
	
	
		

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>