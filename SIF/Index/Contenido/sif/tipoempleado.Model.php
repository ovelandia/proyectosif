<?php
class TipoempleadoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM tipoempleado ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Tipoempleado();

				$alm->__SET('idtipoempleado', $r->idtipoempleado);
				$alm->__SET('cargo', $r->cargo);
		

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idtipoempleado)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tipoempleado WHERE idtipoempleado = ?");
			          

			$stm->execute(array($idtipoempleado));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Tipoempleado();

			$alm->__SET('idtipoempleado', $r->idtipoempleado);
				$alm->__SET('cargo', $r->cargo);
				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idtipoempleado)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM tipoempleado WHERE idtipoempleado = ?");			          

			$stm->execute(array($idtipoempleado));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Tipoempleado $data)
	{
		try 
		{
			$sql = "UPDATE tipoempleado SET 
						cargo        =	? 
					
						
				    WHERE idtipoempleado = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('cargo'), 
					$data->__GET('idtipoempleado')
					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Tipoempleado $data)
	{
		try 
		{
		$sql = "INSERT INTO tipoempleado (cargo) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('cargo'), 
				
							)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}