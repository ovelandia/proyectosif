<?php
class InstructorModel
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

			$stm = $this->pdo->prepare("SELECT * FROM cliente INNER JOIN tipodocumento ON cliente.`tipodocu`=tipodocumento.`idtd` INNER JOIN gennero ON cliente.`genero`=gennero.`Idgen`");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Instructor();

				$alm->__SET('Id', $r->Id);
				//$alm->__SET('Idgen', $r->Idgen);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('apellido', $r->apellido);
				$alm->__SET('documento', $r->documento);
				$alm->__SET('descgenn', $r->descgenn);
				$alm->__SET('direccion', $r->direccion);
				$alm->__SET('ciudad', $r->ciudad);
				$alm->__SET('telefono', $r->telefono);				
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

	public function Obtener($Id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM cliente INNER JOIN tipodocumento ON cliente.`tipodocu`=tipodocumento.`idtd` INNER JOIN gennero ON cliente.`genero`=gennero.`Idgen` WHERE Id = ?");
			          

			$stm->execute(array($Id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Instructor();

			$alm->__SET('Id', $r->Id);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('apellido', $r->apellido);
				$alm->__SET('idtd', $r->idtd);
				$alm->__SET('documento', $r->documento);
				$alm->__SET('Idgen', $r->Idgen);
				$alm->__SET('direccion', $r->direccion);
				$alm->__SET('ciudad', $r->ciudad);
				$alm->__SET('telefono', $r->telefono);				

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($Id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM cliente WHERE Id = ?");			          

			$stm->execute(array($Id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Instructor $data)
	{
		try 
		{
			$sql = "UPDATE cliente SET 
						nombre          =	?, 
						apellido        =	?,
						tipodocu     	=	?,
						documento       =	?, 
						genero 			=	?,
						direccion 		=	?,
						ciudad	     	=	?,
						Telefono     	=	?
				    WHERE Id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombre'), 
					$data->__GET('apellido'),
					$data->__GET('tipodocu'), 
					$data->__GET('documento'), 
					$data->__GET('genero'),
					$data->__GET('direccion'),
					$data->__GET('ciudad'),
					$data->__GET('telefono'),					
					$data->__GET('Id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Instructor $data)
	{
		try 
		{
		$sql = "INSERT INTO cliente (nombre,apellido,tipodocu,documento,genero,direccion,ciudad,telefono) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nombre'), 
				$data->__GET('apellido'),
				$data->__GET('tipodocu'),
				$data->__GET('documento'), 
				$data->__GET('genero'),
				$data->__GET('direccion'),
				$data->__GET('ciudad'),
				$data->__GET('telefono')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}