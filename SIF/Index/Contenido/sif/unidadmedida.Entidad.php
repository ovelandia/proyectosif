<?php
class unidad_medida
{
	private $idunidad_medida;
	private $medida;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
