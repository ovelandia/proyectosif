<?php
class DetalleventaModel
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

			$stm = $this->pdo->prepare("SELECT * FROM detalleventa 
				INNER JOIN venta 
				ON detalleventa.`didventa`=venta.`idventa`

				");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Detalleventa();

				$alm->__SET('iddetalleventa', $r->iddetalleventa);
				$alm->__SET('cantidad', $r->cantidad);
				$alm->__SET('total', $r->total);
				$alm->__SET('fecha', $r->fecha);
				
			

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($iddetalleventa)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM detalleventa
			          INNER JOIN venta ON detalleventa.`didventa`=venta.`idventa` 


			           WHERE iddetalleventa = ?");
			          

			$stm->execute(array($iddetalleventa));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Detalleventa();

			$alm->__SET('iddetalleventa', $r->iddetalleventa);
			$alm->__SET('cantidad', $r->cantidad);
			$alm->__SET('total', $r->total);
			$alm->__SET('idventa', $r->idventa);

	
				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($iddetalleventa)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM detalleventa WHERE iddetalleventa = ?");			          

			$stm->execute(array($iddetalleventa));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Detalleventa $data)
	{
		try 
		{
			$sql = "UPDATE detalleventa SET 
						cantidad          =	?, 
						total          =	?,
						didventa  =?
				
						
				    WHERE iddetalleventa = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('cantidad'), 
					$data->__GET('total'),
					$data->__GET('didventa'),
					 
		
					$data->__GET('iddetalleventa')
					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Detalleventa $data)
	{
		try 
		{
		$sql = "INSERT INTO detalleventa (cantidad,total,didventa) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('cantidad'), 
				 $data->__GET('total'),
				 $data->__GET('didventa')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}