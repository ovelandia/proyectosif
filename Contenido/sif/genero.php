<?php
require_once 'Genero.Entidad.php';
require_once 'Genero.Model.php';

// Logica de negocio
$alm = new Genero();
$model = new GeneroModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('Idgen',            $_REQUEST['Idgen']);
			$alm->__SET('descgenn',         $_REQUEST['descgenn']);
			
			$model->Actualizar($alm);
			header('Location: genero.php');
			break;

		case 'registrar':
			$alm->__SET('Idgen',            $_REQUEST['Idgen']);
            $alm->__SET('descgenn',         $_REQUEST['descgenn']);
            
            $model->Registrar($alm);
            header('Location: genero.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['Idgen']);
			header('Location: genero.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['Idgen']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>

    <br><br>

		<title>FORMULARIO DE GENERO</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                <fieldset ><legend><strong><center><font size="5%">Formulario de Genero</font></center></strong></legend>
                <form action="?action=<?php echo $alm->Idgen > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="Idgen" value="<?php echo $alm->__GET('Idgen'); ?>" />
                    
                    <table style="width:500px;">
                      
                        <tr>
                            <th style="text-align:left;">Tipo Respuesta</th>
                            <td><input type="text" name="descgenn" placeholder="Tipo de genero" required="" value="<?php echo $alm->__GET('descgenn'); ?>" style="width:100%;" /></td>
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
                            
                            <th style="text-align:left;">Tipo Respuesta</th>


                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            
                            <td><?php echo $r->__GET('descgenn'); ?></td>
                            <td>
                                <a href="?action=editar&Idgen=<?php echo $r->Idgen; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&Idgen=<?php echo $r->Idgen; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
        </div>

    </body>
</html>