<?php
class VentaModel
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

			$stm = $this->pdo->prepare("SELECT * FROM venta 
				INNER JOIN cliente 
				ON venta.`vcliente`=cliente.`Id`
				INNER JOIN tipoempleado 
				ON venta.`vtipoempleado`=tipoempleado.`idtipoempleado`
				INNER JOIN tipoventa 
				ON venta.`vtipoventa`=tipoventa.`idtipoventa`

				");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Venta();

				$alm->__SET('idventa', $r->idventa);
				$alm->__SET('fecha', $r->fecha);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('cargo', $r->cargo);
				$alm->__SET('tipoventa', $r->tipoventa);
			

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idventa)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM venta
			          INNER JOIN cliente ON venta.`vcliente`=cliente.`Id` 
			          INNER JOIN tipoempleado ON venta.`vtipoempleado`=tipoempleado.`idtipoempleado` 
			          INNER JOIN tipoventa 
				ON venta.`vtipoventa`=tipoventa.`idtipoventa`

			           WHERE idventa = ?");
			          

			$stm->execute(array($idventa));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Venta();

			$alm->__SET('idventa', $r->idventa);
			$alm->__SET('fecha', $r->fecha);
			$alm->__SET('Id', $r->Id);
			$alm->__SET('idtipoempleado', $r->idtipoempleado);
			$alm->__SET('idtipoventa', $r->idtipoventa);

	
				
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idventa)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM venta WHERE idventa = ?");			          

			$stm->execute(array($idventa));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Venta $data)
	{
		try 
		{
			$sql = "UPDATE venta SET 
						fecha          =	?, 
						vcliente          =	?,
						vtipoempleado  =?,
						vtipoventa =?
				
						
				    WHERE idventa = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('fecha'), 
					$data->__GET('vcliente'),
					$data->__GET('vtipoempleado'),
					$data->__GET('vtipoventa'), 
		
					$data->__GET('idventa')
					
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Venta $data)
	{
		try 
		{
		$sql = "INSERT INTO venta (fecha,vcliente,vtipoempleado,vtipoventa) 
		        VALUES (?, ?, ?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('fecha'), 
				 $data->__GET('vcliente'),
				 $data->__GET('vtipoempleado'),
				 $data->__GET('vtipoventa')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}