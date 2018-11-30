<?php
class Producto
{
	private $idproducto;
	private $desc_prod;
	private $precio;





	


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
