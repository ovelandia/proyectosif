<?php
class tipoventa
{
	private $idtipoventa;
	private $tipoventa;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}