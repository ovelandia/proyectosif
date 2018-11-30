<?php
class EmpleadoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM empleado 
				INNER JOIN tipodocumento 
				ON empleado.`fk_tipodocumento` = tipodocumento.`idtipodocumento`
				INNER JOIN genero ON empleado.`fk_genero`=genero.`idgenero`");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Empleado();

				$alm->__SET('idempleado', $r->idempleado);
				$alm->__SET('nombre_emp', $r->nombre_emp);
				$alm->__SET('apellido_emp', $r->apellido_emp);
				$alm->__SET('documento', $r->documento);
				$alm->__SET('correo', $r->correo);
				$alm->__SET('telefono', $r->telefono);
				$alm->__SET('rol', $r->rol);
				$alm->__SET('direccion', $r->direccion);
				$alm->__SET('password', $r->password);
				$alm->__SET('fk_genero', $r->fk_genero);
				$alm->__SET('fk_tipodocumento', $r->fk_tipodocumento);
			

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
			          ->prepare("SELECT * FROM empleado INNER JOIN tipodocumento ON empleado.fk_tipodocumento=tipodocumento.idtipodocumento INNER JOIN genero ON empleado.fk_genero=genero.idgenero WHERE idempleado = ?");
			           

			$stm->execute(array($idempleado));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Empleado();

				$alm->__SET('idempleado', $r->idempleado);
				$alm->__SET('nombre_emp', $r->nombre_emp);
				$alm->__SET('apellido_emp', $r->apellido_emp);
				$alm->__SET('documento', $r->documento);
				$alm->__SET('correo', $r->correo);
				$alm->__SET('telefono', $r->telefono);
				$alm->__SET('rol', $r->rol);
				$alm->__SET('direccion', $r->direccion);
				$alm->__SET('password', $r->password);
				$alm->__SET('fk_genero', $r->fk_genero);
				$alm->__SET('fk_tipodocumento', $r->fk_tipodocumento);
			

				

	
				
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
						nombre_emp         =	?,
						apellido_emp         =	?,
						documento          =	?, 
						correo         =	?,
						telefono        =	?,
						rol          =	?,
						direccion          =	?,
						password          =	?,
						fk_genero        =	?,
						fk_tipodocumento          =	?
						
						
				
						
				
						
				    WHERE idempleado = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombre_emp'),
				    $data->__GET('apellido_emp'), 
				    $data->__GET('documento'),
				    $data->__GET('correo'),
				    $data->__GET('telefono'),
				    $data->__GET('rol'), 
				    $data->__GET('direccion'),
				    $data->__GET('password'),
				    $data->__GET('fk_genero'),
				    $data->__GET('fk_tipodocumento'),
			
					$data->__GET('idempleado')
					
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
		$sql = "INSERT INTO empleado (nombre_emp,apellido_emp,documento,correo,telefono,rol,direccion,password,fk_genero,fk_tipodocumento) 
		        VALUES (?,?,?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nombre_emp'),
				    $data->__GET('apellido_emp'), 
				    $data->__GET('documento'),
				    $data->__GET('correo'),
				    $data->__GET('telefono'),
				    $data->__GET('rol'), 
				    $data->__GET('direccion'),
				    $data->__GET('password'),
				    $data->__GET('fk_genero'),
				    $data->__GET('fk_tipodocumento'),
			
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}