<?php
class EmpleadoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM empleado 
				INNER JOIN tipoempleado 
				ON empleado.`idtipoempleado`=tipoempleado.`idtipoempleado`

				");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Empleado();

				$alm->__SET('idempleado', $r->idempleado);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('documento', $r->documento);
				$alm->__SET('direccion', $r->direccion);
				$alm->__SET('telefono', $r->telefono);
				$alm->__SET('email', $r->email);
				$alm->__SET('idtipoempleado', $r->idtipoempleado);
				

				$alm->__SET('password', $r->password);
				$alm->__SET('rol', $r->rol);
			

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idempleado)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM empleado
			          INNER JOIN tipoempleado 
			          ON empleado.`didtipoempleado`=tipoempleado.`idtipoempleado` 


			           WHERE idempleado = ?");
			          

			$stm->execute(array($idempleado));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Empleado();

			$alm->__SET('idempleado', $r->idempleado);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('documento', $r->documento);
				$alm->__SET('direccion', $r->direccion);
				$alm->__SET('telefono', $r->telefono);
				$alm->__SET('email', $r->email);
				$alm->__SET('idtipoempleado', $r->idtipoempleado);
				
				$alm->__SET('password', $r->password);
				$alm->__SET('rol', $r->rol);
			
	
				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idempleado)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM empleado WHERE idempleado = ?");			          

			$stm->execute(array($idempleado));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Empleado $data)
	{
		try 
		{
			$sql = "UPDATE empleado SET 
						nombre          =	?,
						documento          =	?, 
						direccion          =	?,
						telefono          =	?,
						email        =	?,
						idtipoempleado = ?,
						
						password = ?,
						rol = ?
				
						
				    WHERE idempleado = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombre'),
				    $data->__GET('documento'), 
				    $data->__GET('direccion'),
				    $data->__GET('telefono'),
				    $data->__GET('email'), 
				    $data->__GET('idtipoempleado'), 
				    
			
					$data->__GET('password'),
					$data->__GET('rol')

					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Empleado $data)
	{
		try 
		{
		$sql = "INSERT INTO empleado (nombre,documento,direccion,telefono,email,idtipoempleado,password,rol) 
		        VALUES (?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nombre'),
				$data->__GET('documento'), 
				$data->__GET('direccion'),
				$data->__GET('telefono'),
				$data->__GET('email'),
				$data->__GET('idtipoempleado'), 
				    
				 $data->__GET('password'),
					$data->__GET('rol')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}