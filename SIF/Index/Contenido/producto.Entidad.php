<?php
class Producto
{
	private $idproducto;
	private $nombre;
	private $preciounitario;
	private $cantidad;
	private $total;
	




	


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
