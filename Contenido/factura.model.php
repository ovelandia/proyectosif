<?php

class FacturaModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=sifv2', 'root', '');
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
					INNER JOIN producto
					ON factura.`producto`=producto.`idproducto`");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Factura();

				$alm->__SET('idfactura', $r->idfactura);
				$alm->__SET('producto', $r->producto);
				$alm->__SET('cantidad', $r->cantidad);
				$alm->__SET('cliente', $r->cliente);
				
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
			          ->prepare("SELECT * FROM factura INNER JOIN producto ON factura.`producto`=producto.`idproducto`

 					WHERE idfactura = ?");			
			          

			$stm->execute(array($idfactura));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new factura();

			$alm->__SET('idfactura', $r->idfactura);
			$alm->__SET('producto', $r->producto);
			$alm->__SET('cantidad', $r->cantidad);
			$alm->__SET('cliente', $r->cliente);
				
				
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
						producto         =	?, 
						cantidad        =	?,
						cliente       = ?

						
						
				    WHERE idfactura = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('producto'), 
					$data->__GET('cantidad'),
					$data->__GET('cliente'),

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
		(producto,cantidad,cliente) 
		        VALUES (?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('producto'), 
				$data->__GET('cantidad'),
				$data->__GET('cliente')
				
				
							)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}