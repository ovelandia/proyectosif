
<?php
class Venta
{
	private $idventa;
	private $fecha;
	private $vcliente;
	private $vtipoempleado;
	private $vtipoventa;
		//estas son las variables de conexion con aprendiz
	private $Id;
	private $nombre;
	private $idtipoempleado;
	private $cargo;
	private $idtipoventa;
	private $tipoventa;
	

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>