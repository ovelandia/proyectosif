<?php
class TipodocumentoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM tipodocumento");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new TipoDocumento();

				$alm->__SET('idtd', $r->idtd);
				$alm->__SET('descripcion', $r->descripcion);


				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idtd)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tipodocumento WHERE idtd = ?");
			          

			$stm->execute(array($idtd));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new TipoDocumento();

				$alm->__SET('idtd', $r->idtd);
				$alm->__SET('descripcion', $r->descripcion);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idtd)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM tipodocumento WHERE idtd = ?");			          

			$stm->execute(array($idtd));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(TipoDocumento $data)
	{
		try 
		{
			$sql = "UPDATE tipodocumento SET 
						
						descripcion		 =?
				    WHERE idtd = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('descripcion'), 
					$data->__GET('idtd')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(TipoDocumento $data)
	{
		try 
		{
		$sql = "INSERT INTO tipodocumento (descripcion) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('descripcion')
				
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}