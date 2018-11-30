<?php
require_once 'distribuidor.entidad.php';
require_once 'distribuidor.model.php';

// Logica de negocio
$alm = new Distribuidor();
$model = new DistribuidorModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('iddistribuidor',            $_REQUEST['iddistribuidor']);
			$alm->__SET('nombre',                    $_REQUEST['nombre']);
            $alm->__SET('telefono',            $_REQUEST['telefono']);
            $alm->__SET('direccion',            $_REQUEST['direccion']);
            $alm->__SET('nit',            $_REQUEST['nit']);
			
			$model->Actualizar($alm);
			header('Location: distribuidor.php');
			break;

		case 'registrar':
			$alm->__SET('iddistribuidor',            $_REQUEST['iddistribuidor']);
            $alm->__SET('nombre',                    $_REQUEST['nombre']);
            $alm->__SET('telefono',            $_REQUEST['telefono']);
            $alm->__SET('direccion',            $_REQUEST['direccion']);
            $alm->__SET('nit',            $_REQUEST['nit']);
            
            $model->Registrar($alm);
            header('Location: distribuidor.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['iddistribuidor']);
			header('Location: distribuidor.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['iddistribuidor']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>



		<title>ADSI - SENA - 1438303 G2</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                 <fieldset><legend><strong><font size="5px"> Formulario de Distribuidor</font></strong></legend>
                <form action="?action=<?php echo $alm->iddistribuidor > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="iddistribuidor" value="<?php echo $alm->__GET('iddistribuidor'); ?>" />
                    
                   <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="nombre" placeholder="Nombre Distribuidor" required="" value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                         <tr>
                            <th style="text-align:left;">Telefono</th>
                            <td><input type="text" name="telefono" placeholder="Telefono Distribuidor" required="" value="<?php echo $alm->__GET('telefono'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Dirección</th>
                            <td><input type="text" name="direccion" placeholder="Dirección Instructor" required  value="<?php echo $alm->__GET('direccion'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">NIT</th>
                            <td><input type="text" name="nit" placeholder="nit del distribuidor" required="" value="<?php echo $alm->__GET('nit'); ?>" style="width:100%;" /></td>
                        </tr>
                                           

                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Telefono</th>
                            <th style="text-align:left;">Direccion</th>
                            <th style="text-align:left;">NIT</th>

                            

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('telefono'); ?></td>
                            <td><?php echo $r->__GET('direccion'); ?></td>
                            <td><?php echo $r->__GET('nit'); ?></td>
                              
                            <td>
                                <a href="?action=editar&iddistribuidor=<?php echo $r->iddistribuidor; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&iddistribuidor=<?php echo $r->iddistribuidor; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
        </div>

    </body>
</html>