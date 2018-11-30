<?php
class Distribuidor
{
	private $iddistribuidor;
	private $nombre;
	private $telefono;
	private $direccion;
	private $nit;

	


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
