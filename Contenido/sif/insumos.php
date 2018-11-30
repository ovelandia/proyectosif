<?php
require_once 'insumos.Entidad.php';
require_once 'insumos.Model.php';
require_once 'unidadmedida.Entidad.php';
require_once 'unidadmedida.Model.php';
require_once 'categoria.Entidad.php';
require_once 'categoria.Model.php';

$alm = new Insumos();
$model = new InsumosModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idinsumos',            $_REQUEST['idinsumos']);
			$alm->__SET('insumo',         $_REQUEST['insumo']);
            $alm->__SET('cantidad_insumos',         $_REQUEST['cantidad_insumos']);
            $alm->__SET('tidunidadmedida',         $_REQUEST['tidunidadmedida']);
            $alm->__SET('cidcategoria',         $_REQUEST['cidcategoria']);
			
			$model->Actualizar($alm);
			header('Location: insumos.php');
			break;

		case 'registrar':
			$alm->__SET('idinsumos',            $_REQUEST['idinsumos']);
            $alm->__SET('insumo',         $_REQUEST['insumo']);
            $alm->__SET('cantidad_insumos',         $_REQUEST['cantidad_insumos']);
            $alm->__SET('tidunidadmedida',         $_REQUEST['tidunidadmedida']);
            $alm->__SET('cidcategoria',         $_REQUEST['cidcategoria']);
            
            $model->Registrar($alm);
            header('Location: insumos.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idinsumos']);
			header('Location: insumos.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idinsumos']);
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
                <fieldset><legend><strong><font size="5px"> Formulario de Insumos</font></strong></legend>
                
                <form action="?action=<?php echo $alm->idinsumos > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idinsumos" value="<?php echo $alm->__GET('idinsumos'); ?>" />
                    
                    <table style="width:500px;">
                      
                        <tr>
                            <th style="text-align:left;">Insumo:</th>
                            <td><input type="text" name="insumo" placeholder="insumo de la Categoria" required="" value="<?php echo $alm->__GET('insumo'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Cantidad de insumos:</th>
                            <td><input type="number" name="cantidad_insumos" placeholder="insumo de la Categoria" required="" value="<?php echo $alm->__GET('cantidad_insumos'); ?>" style="width:100%;" /></td>
                        </tr>


                            <tr>
                            <th style="text-align:left;">Unidad de Medida</th>
                            <td>
                                <select name="tidunidadmedida" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new UnidadmedidaModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idunidad_medida') ?>"
                                    <?php echo $ta->__GET('idunidad_medida') == $alm->__GET('idunidad_medida') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('medida') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Categoria</th>
                            <td>
                                <select name="cidcategoria" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new CategoriaModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idcategoria') ?>"
                                    <?php echo $ta->__GET('idcategoria') == $alm->__GET('idcategoria') ? 'selected' : ''?>>
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
                            <thead>
                        <tr>
                            <th style="text-align:left;">insumo</th>
                            <th style="text-align:left;">cantidad Insumos</th>
                            <th style="text-align:left;">Medida</th>
                            <th style="text-align:left;">Categoria</th>

                        </tr>
                    </thead>
                        
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            
                            <td><?php echo $r->__GET('insumo'); ?></td>
                            <td><?php echo $r->__GET('cantidad_insumos'); ?></td>
                            <td><?php echo $r->__GET('medida'); ?></td>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td>

                                <a href="?action=editar&idinsumos=<?php echo $r->idinsumos; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idinsumos=<?php echo $r->idinsumos; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>>
            </div>
        </div>

    </body>
</html>