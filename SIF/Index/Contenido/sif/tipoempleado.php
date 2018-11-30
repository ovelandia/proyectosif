<?php
require_once 'tipoempleado.entidad.php';
require_once 'tipoempleado.model.php';

// Logica de negocio
$alm = new Tipoempleado();
$model = new TipoempleadoModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idtipoempleado',            $_REQUEST['idtipoempleado']);
			$alm->__SET('cargo',                    $_REQUEST['cargo']);
			
			$model->Actualizar($alm);
			header('Location: tipoempleado.php');
			break;

		case 'registrar':
			$alm->__SET('idtipoempleado',            $_REQUEST['idtipoempleado']);
            $alm->__SET('cargo',                    $_REQUEST['cargo']);
           
            
            $model->Registrar($alm);
            header('Location: tipoempleado.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idtipoempleado']);
			header('Location: tipoempleado.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idtipoempleado']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>

    <fieldset ><legend><strong><center><font size="5%">Formulario Tipo de Empleado</font></center></strong></legend>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;"><br>
           <center>
        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->idtipoempleado > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idtipoempleado" value="<?php echo $alm->__GET('idtipoempleado'); ?>" />
                    
                   <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Cargo</th>
                            <td><input type="text" name="cargo" placeholder="Cargo empleado" required="" value="<?php echo $alm->__GET('cargo'); ?>" style="width:100%;" /></td>
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
                            <th style="text-align:left;">Cargo</th>
                            
                            

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('cargo'); ?></td>
                         
                              
                            <td>
                                <a href="?action=editar&idtipoempleado=<?php echo $r->idtipoempleado; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idtipoempleado=<?php echo $r->idtipoempleado; ?>">Eliminar</a>
                            </td>
                        </tr>
                        </center>
                    <?php endforeach; ?>
                </table>

              </fieldset>

            </div>
        </div>

    </body>
</html>