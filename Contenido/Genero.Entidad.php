<?php
class Genero
{
	private $idgenero;
	private $desc_gen;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}