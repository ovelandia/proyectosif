<?php
class Insumos
{
	private $idinsumos;
	private $insumo;
	private $cantidad_insumos;
	private $tidunidamedida;
	private $cidcategoria;


	private $idunidad_medida;
	private $medida;
	private $idcategoria;
	private $nombre;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}