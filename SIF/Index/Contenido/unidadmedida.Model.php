<?php
class unidadmedidaModel
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

			$stm = $this->pdo->prepare("SELECT * FROM unidad_medida ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new unidad_medida();

				$alm->__SET('idunidad_medida', $r->idunidad_medida);
				$alm->__SET('medida', $r->medida);


				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idunidad_medida)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM unidad_medida WHERE idunidad_medida = ?");
			          

			$stm->execute(array($idunidad_medida));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new unidad_medida();

			$alm->__SET('idunidad_medida', $r->idunidad_medida);
				$alm->__SET('medida', $r->medida);

				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idunidad_medida)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM unidad_medida WHERE idunidad_medida = ?");			          

			$stm->execute(array($idunidad_medida));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(unidad_medida $data)
	{
		try 
		{
			$sql = "UPDATE unidad_medida SET 
						   medida =	?
						
				    WHERE idunidad_medida = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('medida'), 
					$data->__GET('idunidad_medida')
					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(unidad_medida $data)
	{
		try 
		{
		$sql = "INSERT INTO unidad_medida (medida) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
		     	array(
				$data->__GET('medida'), 
							)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}