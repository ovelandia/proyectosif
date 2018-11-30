<?php

class FacturaModel
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

			$stm = $this->pdo->prepare("SELECT * FROM factura 
INNER JOIN distribuidor 
ON factura.`tiddistribuidor`=distribuidor.`iddistribuidor`");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Factura();

				$alm->__SET('idfactura', $r->idfactura);
				$alm->__SET('fecha_factura', $r->fecha_factura);
				$alm->__SET('numero_factura', $r->numero_factura);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('telefono', $r->telefono);
				$alm->__SET('direccion', $r->direccion);
				$alm->__SET('nit', $r->nit);
				
				
				

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idfactura)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM factura 
				INNER JOIN distribuidor 
				ON factura.`tiddistribuidor`=distribuidor.`iddistribuidor`


				 WHERE idfactura = ?");
			          

			$stm->execute(array($idfactura));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new factura();

			$alm->__SET('idfactura', $r->idfactura);
				$alm->__SET('fecha_factura', $r->fecha_factura);
				$alm->__SET('numero_factura', $r->numero_factura);

				$alm->__SET('iddistribuidor', $r->iddistribuidor);
				
				
				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idfactura)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM factura WHERE idfactura = ?");			          

			$stm->execute(array($idfactura));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(factura $data)
	{
		try 
		{
			$sql = "UPDATE factura SET 
						fecha_factura         =	?, 
						numero_factura        =	?,
						tiddistribuidor       = ?

						
						
				    WHERE idfactura = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('fecha_factura'), 
					$data->__GET('numero_factura'),
					$data->__GET('tiddistribuidor'),

					$data->__GET('idfactura')
					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(factura $data)
	{
		try 
		{
		$sql = "INSERT INTO factura 
		(fecha_factura,numero_factura,tiddistribuidor) 
		        VALUES (?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('fecha_factura'), 
				$data->__GET('numero_factura'),
				$data->__GET('tiddistribuidor')
				
				
							)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}