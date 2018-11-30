<?php
require_once 'factura.Entidad.php';
require_once 'factura.Model.php';
require_once 'distribuidor.Entidad.php';
require_once 'distribuidor.Model.php';

$alm = new Factura();
$model = new FacturaModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idfactura',            $_REQUEST['idfactura']);
			$alm->__SET('fecha_factura',         $_REQUEST['fecha_factura']);
            $alm->__SET('numero_factura',         $_REQUEST['numero_factura']);
            $alm->__SET('tiddistribuidor',         $_REQUEST['tiddistribuidor']);
			
			$model->Actualizar($alm);
			header('Location: factura.php');
			break;

		case 'registrar':
			$alm->__SET('idfactura',            $_REQUEST['idfactura']);
            $alm->__SET('fecha_factura',         $_REQUEST['fecha_factura']);
            $alm->__SET('numero_factura',         $_REQUEST['numero_factura']);
            $alm->__SET('tiddistribuidor',         $_REQUEST['tiddistribuidor']);

            $model->Registrar($alm);
            header('Location: factura.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idfactura']);
			header('Location: factura.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idfactura']);
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
                <fieldset><legend><strong><font size="5px"> Formulario de Factura</font></strong></legend>
                
                <form action="?action=<?php echo $alm->idfactura > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idfactura" value="<?php echo $alm->__GET('idfactura'); ?>" />
                    
                   <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Fecha de la factura</th>
                            <td><input type="date" name="fecha_factura" placeholder="Fecha de la factura" required="" value="<?php echo $alm->__GET('fecha_factura'); ?>" style="width:100%;" /></td>
                        </tr>
                         <tr>
                            <th style="text-align:left;"># DE FACTURA</th>
                            <td><input type="number" name="numero_factura" placeholder="Numero de la factura " required="" value="<?php echo $alm->__GET('numero_factura'); ?>" style="width:100%;" /></td>
                        </tr>
                      <tr>
                            <th style="text-align:left;">Distribuidor</th>
                            <td>
                                <select name="distribuidor" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new DistribuidorModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('iddistribuidor') ?>"
                                    <?php echo $ta->__GET('iddistribuidor') == $alm->__GET('iddistribuidor') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('nombre') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
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
                            <th style="text-align:left;">Fecha de la Factura</th>
                            <th style="text-align:left;">Numero de factura</th>

                            <th style="text-align:left;">Nombre del Distribuidor </th>
                            <th style="text-align:left;">Telefono del distribuidor</th>
                            <th style="text-align:left;">Direccion del distrubuidor</th>
                            <th style="text-align:left;">Nit del distribuidor</th>
                          

                            

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('fecha_factura'); ?></td>
                            <td><?php echo $r->__GET('numero_factura'); ?></td>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('telefono'); ?></td>
                            <td><?php echo $r->__GET('direccion'); ?></td>
                            <td><?php echo $r->__GET('nit'); ?></td>
                            
                            
                              
                            <td>
                                <a href="?action=editar&idfactura=<?php echo $r->idfactura; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idfactura=<?php echo $r->idfactura; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
        </div>

    </body>
</html>