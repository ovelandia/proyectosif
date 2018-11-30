<?php
class Factura
{
	private $idfactura;
	private $fecha_factura;
	private $numero_factura;
	private $tiddistribuidor;


	private $iddistribuidor;	
	private $nombre;
	private $telefono;
	private $direccion;
	private $nit;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
