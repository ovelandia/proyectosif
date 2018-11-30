<?php
class CategoriaModel
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

			$stm = $this->pdo->prepare("SELECT * FROM categoria ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Categoria();

				$alm->__SET('idcategoria', $r->idcategoria);
				$alm->__SET('nombre', $r->nombre);


				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idcategoria)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM categoria WHERE idcategoria = ?");
			          

			$stm->execute(array($idcategoria));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Categoria();

			$alm->__SET('idcategoria', $r->idcategoria);
				$alm->__SET('nombre', $r->nombre);

				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idcategoria)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM categoria WHERE idcategoria = ?");			          

			$stm->execute(array($idcategoria));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Categoria $data)
	{
		try 
		{
			$sql = "UPDATE categoria SET 
						   nombre =	?
						
				    WHERE idcategoria = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombre'), 
					$data->__GET('idcategoria')
					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Categoria $data)
	{
		try 
		{
		$sql = "INSERT INTO categoria (nombre) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
		     	array(
				$data->__GET('nombre'), 
							)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}