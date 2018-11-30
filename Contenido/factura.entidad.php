<?php
class Factura
{
	private $idfactura;
	private $idproducto;
	private $producto;
	private $cliente;
	private $cantidad;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
