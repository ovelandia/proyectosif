<?php
class InsumosModel
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

			$stm = $this->pdo->prepare("SELECT * FROM insumos 
				INNER JOIN unidad_medida
				ON insumos.`tidunidadmedida`=unidad_medida.`idunidad_medida`
				INNER JOIN categoria
				ON insumos.`cidcategoria`=categoria.`idcategoria`");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new insumos();

				$alm->__SET('idinsumos', $r->idinsumos);
				$alm->__SET('insumo', $r->insumo);
				$alm->__SET('cantidad_insumos', $r->cantidad_insumos);
				$alm->__SET('medida', $r->medida);
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

	public function Obtener($idinsumos)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM insumos 
				INNER JOIN unidad_medida
				ON insumos.`tidunidadmedida`=unidad_medida.`idunidad_medida` 
				INNER JOIN categoria
				ON insumos.`cidcategoria`=categoria.`idcategoria`
				WHERE idinsumos = ?");
			          

			$stm->execute(array($idinsumos));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new insumos();

			$alm->__SET('idinsumos', $r->idinsumos);
				$alm->__SET('insumo', $r->insumo);
				$alm->__SET('cantidad_insumos', $r->cantidad_insumos);
				$alm->__SET('idunidad_medida', $r->idunidad_medida);
				$alm->__SET('idcategoria', $r->idcategoria);

				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idinsumos)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM insumos WHERE idinsumos = ?");			          

			$stm->execute(array($idinsumos));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(insumos $data)
	{
		try 
		{
			$sql = "UPDATE insumos SET 
						   insumo =	?,
						   cantidad_insumos = ?,
						   tidunidadmedida = ?,
						   cidcategoria    = ?
						
				    WHERE idinsumos = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('insumo'),
					$data->__GET('cantidad_insumos'), 
					$data->__GET('tidunidadmedida'),
					$data->__GET('cidcategoria'), 
					$data->__GET('idinsumos')

					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(insumos $data)
	{
		try 
		{
		$sql = "INSERT INTO insumos (insumo,cantidad_insumos,tidunidadmedida,cidcategoria) 
		        VALUES (?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
		     	array(
				$data->__GET('insumo'),
				$data->__GET('cantidad_insumos'),
				$data->__GET('tidunidadmedida'),
				$data->__GET('cidcategoria')
							)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}