<?php
require_once 'detallefactura.Entidad.php';
require_once 'detallefactura.Model.php';
require_once 'factura.Entidad.php';
require_once 'factura.Model.php';
require_once 'unidadmedida.Entidad.php';
require_once 'unidadmedida.Model.php';
require_once 'insumos.Entidad.php';
require_once 'insumos.Model.php';



$alm = new Detalle_factura();
$model = new DetallefacturaModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('iddetalle_factura',            $_REQUEST['iddetalle_factura']);
            $alm->__SET('cantidad',                     $_REQUEST['cantidad']);
            $alm->__SET('valor',                        $_REQUEST['valor']);
            $alm->__SET('total',                        $_REQUEST['total']);
            $alm->__SET('didfactura',                        $_REQUEST['didfactura']);
            $alm->__SET('didunidadmedida',                        $_REQUEST['didunidadmedida']);
            $alm->__SET('tidinsumos',                        $_REQUEST['tidinsumos']);
                

            
            $model->Actualizar($alm);
            header('Location: detallefactura.php');
            break;

        case 'registrar':
            $alm->__SET('iddetalle_factura',            $_REQUEST['iddetalle_factura']);
            $alm->__SET('cantidad',                    $_REQUEST['cantidad']);
            $alm->__SET('valor',                       $_REQUEST['valor']);
            $alm->__SET('total',                        $_REQUEST['total']);
            $alm->__SET('didfactura',                        $_REQUEST['didfactura']);
            $alm->__SET('didunidadmedida',                        $_REQUEST['didunidadmedida']);
            $alm->__SET('tidinsumos',                        $_REQUEST['tidinsumos']);

            
            $model->Registrar($alm);
            header('Location: detallefactura.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['iddetalle_factura']);
            header('Location: detallefactura.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['iddetalle_factura']);
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
                
                <fieldset><legend><strong><font size="5px"> Formulario de Detalle Factura</font></strong></legend>
                <form action="?action=<?php echo $alm->iddetalle_factura > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="iddetalle_factura" value="<?php echo $alm->__GET('iddetalle_factura'); ?>" />
                    
                   <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Cantidad</th>
                            <td><input type="decimal" name="cantidad" placeholder="Cantidad del producto" required="" value="<?php echo $alm->__GET('cantidad'); ?>" style="width:100%;" /></td>
                        </tr>
                         <tr>
                            <th style="text-align:left;">Valor del producto</th>
                            <td><input type="number" name="valor" placeholder="Ingrese valor " required="" value="<?php echo $alm->__GET('valor'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Total</th>
                            <td><input type="number" name="total" placeholder="Cantidad" required  value="<?php echo $alm->__GET('total'); ?>" style="width:100%;" /></td>
                        </tr>



                        <tr>
                            <th style="text-align:left;">Factura</th>
                            <td>
                                <select name="didfactura" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new FacturaModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idfactura') ?>"
                                    <?php echo $ta->__GET('idfactura') == $alm->__GET('idfactura') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('fecha_factura') ?></option>
                                    <?php echo $ta->__GET('numero_factura') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>


                        <tr>
                            <th style="text-align:left;">Uni.Medida</th>
                            <td>
                                <select name="didunidadmedida" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new unidadmedidaModel();
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
                            <th style="text-align:left;">Insumos</th>
                            <td>
                                <select name="tidinsumos" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new InsumosModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idinsumos') ?>"
                                    <?php echo $ta->__GET('idinsumos') == $alm->__GET('idinsumos') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('insumo') ?></option>
                                    <?php echo $ta->__GET('cantidad_insumos') ?></option>
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
                            <th style="text-align:left;">Cantidad</th>
                            <th style="text-align:left;">Valor</th>
                            <th style="text-align:left;">Total</th>
                            <th style="text-align:left;">Fecha de Factura</th>
                            <th style="text-align:left;">Numero Factura</th>
                            <th style="text-align:left;">Unidad Medida</th>
                            <th style="text-align:left;">Insumos</th>
                            <th style="text-align:left;">Cantidad de insumos</th>
                          

                            

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('cantidad'); ?></td>
                            <td><?php echo $r->__GET('valor'); ?></td>
                            <td><?php echo $r->__GET('total'); ?></td>
                            <td><?php echo $r->__GET('medida'); ?></td>
                            <td><?php echo $r->__GET('numero_factura'); ?></td>
                            <td><?php echo $r->__GET('medida'); ?></td>
                            <td><?php echo $r->__GET('insumo'); ?></td>
                            <td><?php echo $r->__GET('cantidad_insumos'); ?></td>
                            
                              
                            <td>
                                <a href="?action=editar&iddetalle_factura=<?php echo $r->iddetalle_factura; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&iddetalle_factura=<?php echo $r->iddetalle_factura; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
        </div>

    </body>
</html>