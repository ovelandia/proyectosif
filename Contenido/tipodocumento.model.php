<?php
class TipodocumentoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM tipodocumento");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new TipoDocumento();

				$alm->__SET('idtipodocumento', $r->idtipodocumento);
				$alm->__SET('desc_doc', $r->desc_doc);


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
			          ->prepare("SELECT * FROM tipodocumento WHERE idtipodocumento = ?");
			          

			$stm->execute(array($idtipodocumento));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new TipoDocumento();

				$alm->__SET('idtipodocumento', $r->idtipodocumento);
				$alm->__SET('desc_doc', $r->desc_doc);

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
			          ->prepare("DELETE FROM tipodocumento WHERE idtipodocumento = ?");			          

			$stm->execute(array($idtipodocumento));
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
						
						desc_doc		 =?
				    WHERE idtipodocumento = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('desc_doc'), 
					$data->__GET('idtipodocumento')
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
		$sql = "INSERT INTO tipodocumento (desc_doc) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('desc_doc')
				
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}