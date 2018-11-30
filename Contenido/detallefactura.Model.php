<?php

class DetallefacturaModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=sif', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM detalle_factura
			INNER JOIN factura
			ON detalle_factura.`didfactura`=factura.`idfactura`
			INNER JOIN unidad_medida
			ON detalle_factura.`didunidadmedida`=unidad_medida.`idunidad_medida`  
			INNER JOIN insumos
			ON detalle_factura.`tidinsumos`=insumos.`idinsumos`");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new detalle_factura();

				$alm->__SET('iddetalle_factura', $r->iddetalle_factura);
				$alm->__SET('cantidad', $r->cantidad);		
				$alm->__SET('valor', $r->valor);
				$alm->__SET('total', $r->total);
				$alm->__SET('fecha_factura', $r->fecha_factura);
				$alm->__SET('numero_factura', $r->numero_factura);
				$alm->__SET('medida', $r->medida);
				$alm->__SET('insumo', $r->insumo);
				$alm->__SET('cantidad_insumos', $r->cantidad_insumos);
			
				

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($iddetalle_factura)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM detalle_factura
			          INNER JOIN factura
			          ON detalle_factura.`didfactura`=factura.`idfactura` 
			          INNER JOIN unidad_medida
			          ON detalle_factura.`didunidadmedida`=unidad_medida.`idunidad_medida`
			          INNER JOIN insumos
			          ON detalle_factura.`tidinsumos`=insumos.`idinsumos`

			          WHERE iddetalle_factura = ?");
			          

			$stm->execute(array($iddetalle_factura));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new detalle_factura();

			$alm->__SET('iddetalle_factura', $r->iddetalle_factura);
			    $alm->__SET('cantidad', $r->cantidad);
				$alm->__SET('valor', $r->valor);
				$alm->__SET('total', $r->total);
				$alm->__SET('idfactura', $r->idfactura);
				$alm->__SET('idunidad_medida', $r->idunidad_medida);
				$alm->__SET('idinsumos', $r->idinsumos);
				
				
				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($iddetalle_factura)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM detalle_factura WHERE iddetalle_factura = ?");			          

			$stm->execute(array($iddetalle_factura));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(detalle_factura $data)
	{
		try 
		{
			$sql = "UPDATE detalle_factura SET
			            cantidad     	=	?, 
						valor          =	?, 
						total        =	?,
						didfactura   = ?,
						didunidadmedida  =?,
						tidinsumos      =?
						
						
						
				    WHERE iddetalle_factura = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('cantidad'),
					$data->__GET('valor'), 
					$data->__GET('total'),
					$data->__GET('didfactura'),
					$data->__GET('didunidadmedida'),
					$data->__GET('tidinsumos'),
					$data->__GET('iddetalle_factura')
					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(detalle_factura $data)
	{
		try 
		{
		$sql = "INSERT INTO detalle_factura (cantidad,valor,total,didfactura,didunidadmedida,tidinsumos) 
		        VALUES (?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('cantidad'),
				$data->__GET('valor'), 
				$data->__GET('total'),
				$data->__GET('didfactura'),
				$data->__GET('didunidadmedida'),
				$data->__GET('tidinsumos')
				
				
							)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}