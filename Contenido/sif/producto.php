<?php
require_once 'producto.entidad.php';
require_once 'producto.model.php';

// Logica de negocio
$alm = new Producto();
$model = new ProductoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('idproducto',            $_REQUEST['idproducto']);
            $alm->__SET('nombre',                    $_REQUEST['nombre']);
            $alm->__SET('preciounitario',            $_REQUEST['preciounitario']);
            $alm->__SET('cantidad',            $_REQUEST['cantidad']);
        
            
            $model->Actualizar($alm);
            header('Location: producto.php');
            break;

        case 'registrar':
            $alm->__SET('idproducto',            $_REQUEST['idproducto']);
            $alm->__SET('nombre',                    $_REQUEST['nombre']);
            $alm->__SET('preciounitario',            $_REQUEST['preciounitario']);
            $alm->__SET('cantidad',            $_REQUEST['cantidad']);
            
            
            $model->Registrar($alm);
            header('Location: producto.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idproducto']);
            header('Location: producto.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idproducto']);
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
                <fieldset><legend><strong><font size="5px"> Formulario de los Productos</font></strong></legend>
                
                <form action="?action=<?php echo $alm->idproducto > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idproducto" value="<?php echo $alm->__GET('idproducto'); ?>" />
                    
                   <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="nombre" placeholder="Nombre producto" required="" value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                         <tr>
                            <th style="text-align:left;">preciounitario</th>
                            <td><input type="number" name="preciounitario" placeholder="precio unitario " required="" value="<?php echo $alm->__GET('preciounitario'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Cantidad</th>
                            <td><input type="number" name="cantidad" placeholder="Cantidad" required  value="<?php echo $alm->__GET('cantidad'); ?>" style="width:100%;" /></td>
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
                            <th style="text-align:left;">preciounitario</th>
                            <th style="text-align:left;">cantidad</th>
                          

                            

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('preciounitario'); ?></td>
                            <td><?php echo $r->__GET('cantidad'); ?></td>
                            
                              
                            <td>
                                <a href="?action=editar&idproducto=<?php echo $r->idproducto; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idproducto=<?php echo $r->idproducto; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>