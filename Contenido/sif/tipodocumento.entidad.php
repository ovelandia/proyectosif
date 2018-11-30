<?php
class TipoDocumento
{

	private $idtd;
	private $descripcion;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}