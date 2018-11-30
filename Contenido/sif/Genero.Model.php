<?php
class GeneroModel
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

			$stm = $this->pdo->prepare("SELECT * FROM gennero");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Genero();

				$alm->__SET('Idgen', $r->Idgen);
				$alm->__SET('descgenn', $r->descgenn);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($Idgen)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM gennero WHERE Idgen = ?");
			          

			$stm->execute(array($Idgen));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Genero();

			$alm->__SET('Idgen', $r->Idgen);
				$alm->__SET('descgenn', $r->descgenn);				

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($Idgen)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM gennero WHERE Idgen = ?");			          

			$stm->execute(array($Idgen));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Genero $data)
	{
		try 
		{
			$sql = "UPDATE gennero SET 
						descgenn      = ?
				    WHERE Idgen = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('descgenn'),
					$data->__GET('Idgen')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Genero $data)
	{
		try 
		{
		$sql = "INSERT INTO gennero (descgenn) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('descgenn')

				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}