<?php
require_once 'venta.Entidad.php';
require_once 'venta.Model.php';
require_once 'Instructor.Entidad.php';
require_once 'Instructor.Model.php';
require_once 'tipoempleado.Model.php';
require_once 'tipoempleado.Entidad.php';
require_once 'tipoventa.Model.php';
require_once 'tipoventa.Entidad.php';

// Logica de negocio
$alm = new Venta();
$model = new VentaModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('idventa',            $_REQUEST['idventa']);
            $alm->__SET('fecha',                    $_REQUEST['fecha']);
           $alm->__SET('vcliente',            $_REQUEST['vcliente']);
           $alm->__SET('vtipoempleado',            $_REQUEST['vtipoempleado']);
           $alm->__SET('vtipoventa',            $_REQUEST['vtipoventa']);
            
            $model->Actualizar($alm);
            header('Location: venta.php');
            break;

        case 'registrar':
            
            $alm->__SET('fecha',                    $_REQUEST['fecha']);
             $alm->__SET('vcliente',            $_REQUEST['vcliente']);
             $alm->__SET('vtipoempleado',            $_REQUEST['vtipoempleado']);
            $alm->__SET('vtipoventa',            $_REQUEST['vtipoventa']);
             
            $model->Registrar($alm);
            header('Location: venta.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idventa']);
            header('Location: venta.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idventa']);
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
                 <fieldset><legend><strong><font size="5px"> Formulario de Venta</font></strong></legend>
                
                <form action="?action=<?php echo $alm->idventa > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idventa" value="<?php echo $alm->__GET('idventa'); ?>" />
                    
                   <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Fecha</th>
                            <td><input type="date" name="fecha" placeholder="Fecha Actividad" required="" value="<?php echo $alm->__GET('fecha'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Cliente</th>
                            <td>
                                <select name="vcliente" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new InstructorModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('Id') ?>"
                                    <?php echo $ta->__GET('Id') == $alm->__GET('Id') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('nombre') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Tipo Empleado</th>
                            <td>
                                <select name="vtipoempleado" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $temp = new TipoempleadoModel();
                                        foreach($temp->Listar() as $te):
                                    ?>
                                    <option value="<?php echo $te->__GET('idtipoempleado') ?>"
                                    <?php echo $te->__GET('idtipoempleado') == $alm->__GET('idtipoempleado') ? 'selected' : ''?>>
                                    <?php echo $te->__GET('cargo') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Tipo de Venta</th>
                            <td>
                                <select name="vtipoventa" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tven = new TipoventaModel();
                                        foreach($tven->Listar() as $tv):
                                    ?>
                                    <option value="<?php echo $tv->__GET('idtipoventa') ?>"
                                    <?php echo $tv->__GET('idtipoventa') == $alm->__GET('idtipoventa') ? 'selected' : ''?>>
                                    <?php echo $tv->__GET('tipoventa') ?></option>
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
                            <th style="text-align:left;">Fecha</th>
                            
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Empleado</th>
                            <th style="text-align:left;">Tipo Venta</th>
                            

                            

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('fecha'); ?></td>
                            
                            <td><?php echo $r->__GET('nombre'); ?></td>
                             <td><?php echo $r->__GET('cargo'); ?></td>
                             <td><?php echo $r->__GET('tipoventa'); ?></td>
                        
                              
                            <td>
                                <a href="?action=editar&idventa=<?php echo $r->idventa; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idventa=<?php echo $r->idventa; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>