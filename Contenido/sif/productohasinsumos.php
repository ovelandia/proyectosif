<?php
require_once 'productohasinsumos.Entidad.php';
require_once 'productohasinsumos.Model.php';
require_once 'producto.Entidad.php';
require_once 'producto.Model.php';
require_once 'insumos.Model.php';
require_once 'insumos.Entidad.php';

// Logica de negocio
$alm = new Productohas();
$model = new ProductohasModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
        $alm->__SET('idproductohas',            $_REQUEST['idproductohas']);
            $alm->__SET('phinsumos',            $_REQUEST['phinsumos']);
            $alm->__SET('phproducto',           $_REQUEST['phproducto']);
            
            $model->Actualizar($alm);
            header('Location: productohasinsumos.php');
            break;


        case 'registrar':
            
            $alm->__SET('phinsumos',             $_REQUEST['phinsumos']);
            $alm->__SET('phproducto',            $_REQUEST['phproducto']);
            $model->Registrar($alm);
            header('Location: productohasinsumos.php');
            break;

             case 'eliminar':
            $model->Eliminar($_REQUEST['idproductohas']);
            
            header('Location: productohasinsumos.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idproductohas']);

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
                 <fieldset><legend><strong><font size="5px"> Formulario de los Productos y los Insumos </font></strong></legend>
                <form action="?action=<?php echo $alm->idproductohas > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idproductohas" value="<?php echo $alm->__GET('idproductohas'); ?>" />
                
            
                    
                   <table style="width:500px;">
                      
                        <tr>
                            <th style="text-align:left;">Producto</th>
                            <td>
                                <select name="phproducto" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new ProductoModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idproducto') ?>"
                                    <?php echo $ta->__GET('idproducto') == $alm->__GET('idproducto') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('nombre') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Insumos</th>
                            <td>
                                <select name="phinsumos" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $temp = new InsumosModel();
                                        foreach($temp->Listar() as $te):
                                    ?>
                                    <option value="<?php echo $te->__GET('idinsumos') ?>"
                                    <?php echo $te->__GET('idinsumos') == $alm->__GET('idinsumos') ? 'selected' : ''?>>
                                    <?php echo $te->__GET('insumo') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        
                                           

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
                            <th style="text-align:left;">Producto</th>
                            
                            <th style="text-align:left;">Insumo</th>
                            <th></th>
                            <th></th>
                       
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            
                            <td><?php echo $r->__GET('insumo'); ?></td>
                        
                       <td>
                                <a href="?action=editar&idproductohas=<?php echo $r->idproductohas; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idproductohas=<?php echo $r->idproductohas; ?>">Eliminar</a>
                            </td>
                              
                      </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>