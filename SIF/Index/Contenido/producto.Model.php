<?php

class ProductoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM producto ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Producto();

				$alm->__SET('idproducto', $r->idproducto);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('preciounitario', $r->preciounitario);
				$alm->__SET('cantidad', $r->cantidad);
				$alm->__SET('total', $r->total);

				
				

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
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('preciounitario', $r->preciounitario);
				$alm->__SET('cantidad', $r->cantidad);
				$alm->__SET('total', $r->total);
			
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
						nombre          =	?, 
						preciounitario        =	?,
						cantidad     	=	?,
						total = ?,
					
						
						
				    WHERE idproducto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombre'), 
					$data->__GET('preciounitario'),
					$data->__GET('cantidad'), 
					$data->__GET('total'),
					
					
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
		$sql = "INSERT INTO producto (nombre,preciounitario,cantidad,total) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nombre'), 
				$data->__GET('preciounitario'),
				$data->__GET('cantidad'),
				$data->__GET('total'),
							
							)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}