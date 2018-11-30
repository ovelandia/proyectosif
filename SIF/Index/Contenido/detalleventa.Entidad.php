<?php
class Detalleventa
{
	private $iddetalleventa;
	private $cantidad;
	private $total;
	private $didventa;
	
		//estas son las variables de conexion con aprendiz
	private $idventa;
	private $fecha;
		

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>