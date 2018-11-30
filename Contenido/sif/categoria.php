<?php
require_once 'categoria.Entidad.php';
require_once 'categoria.Model.php';


$alm = new Categoria();
$model = new CategoriaModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idcategoria',            $_REQUEST['idcategoria']);
			$alm->__SET('nombre',         $_REQUEST['nombre']);
			
			$model->Actualizar($alm);
			header('Location: categoria.php');
			break;

		case 'registrar':
			$alm->__SET('idcategoria',            $_REQUEST['idcategoria']);
            $alm->__SET('nombre',         $_REQUEST['nombre']);
            
            $model->Registrar($alm);
            header('Location: categoria.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idcategoria']);
			header('Location: categoria.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idcategoria']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>

    <fieldset ><legend><strong><center><font size="5%">~Formulario de Categoria de Producto~</font></center></strong></legend>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->idcategoria > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idcategoria" value="<?php echo $alm->__GET('idcategoria'); ?>" />
                    
                    <table style="width:500px;">
                      
                        <tr>
                            <th style="text-align:left;">Categoria</th>
                            <td><input type="text" name="nombre" placeholder="Nombre de la Categoria" required="" value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" /></td>
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
                            <th style="text-align:left;">Nombre</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                        
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td>

                                <a href="?action=editar&idcategoria=<?php echo $r->idcategoria; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idcategoria=<?php echo $r->idcategoria; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>