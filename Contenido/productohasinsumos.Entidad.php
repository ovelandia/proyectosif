
<?php
class Productohas
{

	private $idproductohas;
	private $phinsumos;
	private $phproducto;
		//estas son las variables de conexion con aprendiz
	private $idinsumos;
	private $insumo;
	private $idproducto;
	private $nombre;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>