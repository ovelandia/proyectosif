<?php
class detalle_factura
{
	private $iddetalle_factura;
	private $cantidad;
	private $valor;
	private $total;
	private $didfactura;
	private $didunidadmedida;
	private $tidinsumos;


	private $idfactura;
	private $fecha_factura;
	private $numero_factura;

	private $idunidad_medida;
	private $medida;

	private $idinsumos;
	private $insumo;
	private $cantidad_insumos;
	


	


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
