<?php
class TipoDocumento
{

	private $idtipodocumento;
	private $desc_doc;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}