<?php
class Genero
{
	private $Idgen;
	private $descgenn;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}