<?php
class DistribuidorModel
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

			$stm = $this->pdo->prepare("SELECT * FROM distribuidor ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Distribuidor();

				$alm->__SET('iddistribuidor', $r->iddistribuidor);
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

	public function Obtener($iddistribuidor)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare(" SELECT * FROM distribuidor
			          INNER JOIN factura ON distribuidor.`iddistribuidor`=distribuidor.`iddistribuidor` 


			           WHERE iddistribuidor = ?");
			          

			$stm->execute(array($iddistribuidor));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Distribuidor();

			$alm->__SET('iddistribuidor', $r->iddistribuidor);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('telefono', $r->telefono);
				$alm->__SET('direccion', $r->direccion);
				$alm->__SET('nit', $r->nit);
				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($iddistribuidor)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM distribuidor WHERE iddistribuidor = ?");			          

			$stm->execute(array($iddistribuidor));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Distribuidor $data)
	{
		try 
		{
			$sql = "UPDATE distribuidor SET 
						nombre          =	?, 
						telefono        =	?,
						direccion     	=	?,
						nit       =	? 
						
				    WHERE iddistribuidor = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombre'), 
					$data->__GET('telefono'),
					$data->__GET('direccion'), 
					$data->__GET('nit'), 
					$data->__GET('iddistribuidor')
					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Distribuidor $data)
	{
		try 
		{
		$sql = "INSERT INTO distribuidor (nombre,telefono,direccion,nit) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nombre'), 
				$data->__GET('telefono'),
				$data->__GET('direccion'),
				$data->__GET('nit'), 
							)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}