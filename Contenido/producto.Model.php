<?php

class ProductoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM producto ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Producto();

				$alm->__SET('idproducto', $r->idproducto);
				$alm->__SET('desc_prod', $r->desc_prod);
				$alm->__SET('precio', $r->precio);
			
				
				;
				

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idproducto)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM producto WHERE idproducto = ?");
			          

			$stm->execute(array($idproducto));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Producto();

				$alm->__SET('idproducto', $r->idproducto);
				$alm->__SET('desc_prod', $r->desc_prod);
				$alm->__SET('precio', $r->precio);
			
			
				
				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idproducto)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM producto WHERE idproducto = ?");			          

			$stm->execute(array($idproducto));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	} 

	public function Actualizar(Producto $data)
	{
		try 
		{
			$sql = "UPDATE producto SET 
						desc_prod =	?, 
						precio = ?
				
						
						
						
				    WHERE idproducto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					
					$data->__GET('desc_prod'), 
					$data->__GET('precio'),
					$data->__GET('idproducto')
					
					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Producto $data)
	{
		try 
		{
		$sql = "INSERT INTO producto ( desc_prod, precio) 
		        VALUES ( ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				
				$data->__GET('desc_prod'), 
				$data->__GET('precio')
				
							
							)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}