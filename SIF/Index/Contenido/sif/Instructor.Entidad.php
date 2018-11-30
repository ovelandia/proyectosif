<?php
class Instructor
{
	private $Id;
	private $nombre;
	private $apellido;
	private $tipodocu;
	private $documento;
	private $genero;
	private $direccion;
	private $ciudad;
	private $telefono;
	private $idtd;
	private $descripcion;
	private $Idgen;
	private $descgenn;
	


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
