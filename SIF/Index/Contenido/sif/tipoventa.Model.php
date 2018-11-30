<?php

class TipoventaModel
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

			$stm = $this->pdo->prepare("SELECT * FROM tipoventa ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Tipoventa();

				$alm->__SET('idtipoventa', $r->idtipoventa);
				$alm->__SET('tipoventa', $r->tipoventa);
				

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idtipoventa)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tipoventa WHERE idtipoventa = ?");
			          

			$stm->execute(array($idtipoventa));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Tipoventa();

			$alm->__SET('idtipoventa', $r->idtipoventa);
				$alm->__SET('tipoventa', $r->tipoventa);
				
				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idtipoventa)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM tipoventa WHERE idtipoventa = ?");			          

			$stm->execute(array($idtipoventa));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Tipoventa $data)
	{
		try 
		{
			$sql = "UPDATE tipoventa SET 
						tipoventa   =	?
					
						
				    WHERE idtipoventa= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('tipoventa'), 
					$data->__GET('idtipoventa')
				
					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Tipoventa $data)
	{
		try 
		{
		$sql = "INSERT INTO tipoventa (tipoventa) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('tipoventa')
				
							)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}