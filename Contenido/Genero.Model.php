<?php
class GeneroModel
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

			$stm = $this->pdo->prepare("SELECT * FROM genero");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Genero();

				$alm->__SET('idgenero', $r->idgenero);
				$alm->__SET('desc_gen', $r->desc_gen);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idgenero)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM genero WHERE idgenero = ?");
			          

			$stm->execute(array($idgenero));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Genero();

			$alm->__SET('idgenero', $r->idgenero);
				$alm->__SET('desc_gen', $r->desc_gen);				

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idgenero)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM genero WHERE idgenero = ?");			          

			$stm->execute(array($idgenero));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Genero $data)
	{
		try 
		{
			$sql = "UPDATE genero SET 
						desc_gen     = ?
				    WHERE idgenero = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('desc_gen'),
					$data->__GET('idgenero')
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
		$sql = "INSERT INTO genero (desc_gen) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('desc_gen')

				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}