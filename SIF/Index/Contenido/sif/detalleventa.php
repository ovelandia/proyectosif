<?php
require_once 'detalleventa.Entidad.php';
require_once 'detalleventa.Model.php';
require_once 'venta.Model.php';
require_once 'venta.Entidad.php';

// Logica de negocio
$alm = new Detalleventa();
$model = new DetalleventaModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('iddetalleventa',            $_REQUEST['iddetalleventa']);
            $alm->__SET('cantidad',                    $_REQUEST['cantidad']);
           $alm->__SET('precio',            $_REQUEST['precio']);
           $alm->__SET('didventa',            $_REQUEST['didventa']);
           #$alm->__SET('didproducto',            $_REQUEST['didproducto']);
            
            $model->Actualizar($alm);
            header('Location: detalleventa.php');
            break;

        case 'registrar':
            
            $alm->__SET('cantidad',                    $_REQUEST['cantidad']);
             $alm->__SET('precio',            $_REQUEST['precio']);
             $alm->__SET('didventa',            $_REQUEST['didventa']);
            #$alm->__SET('didproducto',            $_REQUEST['didproducto']);
             
            $model->Registrar($alm);
            header('Location: detalleventa.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['iddetalleventa']);
            header('Location: detalleventa.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['iddetalleventa']);
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
                <fieldset><legend><strong><font size="5px"> Formulario del Detalle de Venta</font></strong></legend>
                
                <form action="?action=<?php echo $alm->iddetalleventa > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="iddetalleventa" value="<?php echo $alm->__GET('iddetalleventa'); ?>" />
                    
                   <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Cantidad</th>
                            <td><input type="number" name="cantidad" placeholder="cantidad Actividad" required="" value="<?php echo $alm->__GET('cantidad'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Precio</th>
                            <td><input type="number" name="precio" placeholder="Precio del producto en ($)" required="" value="<?php echo $alm->__GET('precio'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Venta</th>
                            <td>
                                <select name="precio" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new VentaModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idventa') ?>"
                                    <?php echo $ta->__GET('idventa') == $alm->__GET('idventa') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('fecha') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr> 
     
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
                            <th style="text-align:left;">cantidad</th>
                            <th style="text-align:left;">total</th>
                            <th style="text-align:left;">fecha</th>
                            

                            

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('cantidad'); ?></td>
                            
                            <td><?php echo $r->__GET('total'); ?></td>
                             <td><?php echo $r->__GET('fecha'); ?></td>
                             
                        
                              
                            <td>
                                <a href="?action=editar&iddetalleventa=<?php echo $r->iddetalleventa; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&iddetalleventa=<?php echo $r->iddetalleventa; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>