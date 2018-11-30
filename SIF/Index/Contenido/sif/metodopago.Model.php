<?php
class MetodopagoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM metododepago ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new 	Metodopago();

				$alm->__SET('idmetododepago', $r->idmetododepago);
				$alm->__SET('metododepago',         $r->metododepago);
		

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idmetododepago)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM metododepago WHERE idmetododepago = ?");
			          

			$stm->execute(array($idmetododepago));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Metodopago();

			$alm->__SET('idmetododepago', $r->idmetododepago);
				$alm->__SET('metododepago', $r->metododepago);
				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idmetododepago)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM metododepago WHERE idmetododepago = ?");			          

			$stm->execute(array($idmetododepago));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Metodopago $data)
	{
		try 
		{
			$sql = "UPDATE metododepago SET 
						metododepago        =	? 
					
						
				    WHERE idmetododepago = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('metododepago'), 
					$data->__GET('idmetododepago')
					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Metodopago $data)
	{
		try 
		{
		$sql = "INSERT INTO metododepago (metododepago) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('metododepago'), 
				
							)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}