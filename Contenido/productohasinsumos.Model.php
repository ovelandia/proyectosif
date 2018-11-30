<?php



class ProductohasModel
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

			$stm = $this->pdo->prepare("SELECT * FROM productohasinsumos
				INNER JOIN insumos
				ON productohasinsumos.`phinsumos`=insumos.`idinsumos`
				INNER JOIN producto
				ON productohasinsumos.`phproducto`=producto.`idproducto`
				

				");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Productohas();

				$alm->__SET('idproductohas', $r->idproductohas);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('insumo', $r->insumo);
			

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Obtener($idproductohas)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM productohasinsumos
								INNER JOIN producto ON productohasinsumos.`phproducto`=producto.`idproducto` 
								INNER JOIN insumos ON productohasinsumos.`phinsumos`= insumos.`idinsumos` WHERE idproductohas = ?
								");
			          

			$stm->execute(array($idproductohas));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Productohas();
			$alm->__SET('idproductohas', $r->idproductohas);
			$alm->__SET('idinsumos', $r->idinsumos);
			$alm->__SET('idproducto', $r->idproducto);
			
				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idproductohas)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM productohasinsumos WHERE idproductohas=?");			          

			$stm->execute(array($idproductohas));

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Actualizar(Productohas $data)
	{
		try 
		{
			$sql = "UPDATE productohasinsumos SET 
						phinsumos          =	?, 
						phproducto          =	?
						
				    WHERE idproductohas = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('phinsumos'), 
					$data->__GET('phproducto'),
		
					$data->__GET('idproductohas')
					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function Registrar(Productohas $data)
	{
		try 
		{
		$sql = "INSERT INTO productohasinsumos (phinsumos,phproducto) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array( 
				 $data->__GET('phinsumos'),
				 $data->__GET('phproducto')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}