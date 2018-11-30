<?php
require_once 'unidadmedida.Entidad.php';
require_once 'unidadmedida.Model.php';


$alm = new unidad_medida();
$model = new unidadmedidaModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idunidad_medida',            $_REQUEST['idunidad_medida']);
			$alm->__SET('medida',         $_REQUEST['medida']);
			
			$model->Actualizar($alm);
			header('Location: unidadmedida.php');
			break;

		case 'registrar':
			$alm->__SET('idunidad_medida',            $_REQUEST['idunidad_medida']);
            $alm->__SET('medida',         $_REQUEST['medida']);
            
            $model->Registrar($alm);
            header('Location: unidadmedida.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idunidad_medida']);
			header('Location: unidadmedida.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idunidad_medida']);
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
                 <fieldset><legend><strong><font size="5px"> Formulario de Unidad de Medida</font></strong></legend>
                <form action="?action=<?php echo $alm->idunidad_medida > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idunidad_medida" value="<?php echo $alm->__GET('idunidad_medida'); ?>" />
                    
                    <table style="width:500px;">
                      
                        <tr>
                            <th style="text-align:left;">Escriba la Unidad de Medida</th>
                            <td><input type="text" name="medida" placeholder="Unidad de medida" required="" value="<?php echo $alm->__GET('medida'); ?>" style="width:100%;" /></td>
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
                            <thead>
                        <tr>
                            <th style="text-align:left;">Unidad</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                        
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            
                            <td><?php echo $r->__GET('medida'); ?></td>
                            <td>

                                <a href="?action=editar&idunidad_medida=<?php echo $r->idunidad_medida; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idunidad_medida=<?php echo $r->idunidad_medida; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
        </div>

    </body>
</html>