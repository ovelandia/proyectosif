<?php
require_once 'empleado.Entidad.php';
require_once 'empleado.Model.php';
require_once 'tipoempleado.Model.php';
require_once 'tipoempleado.Entidad.php';

$alm = new Empleado();
$model = new EmpleadoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('idempleado',            $_REQUEST['idempleado']);
            $alm->__SET('nombre',                    $_REQUEST['nombre']);
            $alm->__SET('documento',                    $_REQUEST['documento']);
            $alm->__SET('direccion',                    $_REQUEST['direccion']);
            $alm->__SET('telefono',                    $_REQUEST['telefono']);
            $alm->__SET('email',                    $_REQUEST['email']);
           $alm->__SET('didtipoempleado',            $_REQUEST['didtipoempleado']);
     
            $model->Actualizar($alm);
            header('Location: empleado.php');
            break;

        case 'registrar':
            
            $alm->__SET('idempleado',            $_REQUEST['idempleado']);
            $alm->__SET('nombre',                    $_REQUEST['nombre']);
            $alm->__SET('documento',                    $_REQUEST['documento']);
            $alm->__SET('direccion',                    $_REQUEST['direccion']);
            $alm->__SET('telefono',                    $_REQUEST['telefono']);
            $alm->__SET('email',                    $_REQUEST['email']);
           $alm->__SET('didtipoempleado',            $_REQUEST['didtipoempleado']);
     
             
            $model->Registrar($alm);
            header('Location: empleado.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idempleado']);
            header('Location: empleado.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idempleado']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>

    <h1>FORMULARIO DE EMPLEADO</h1><br>

        <title>ADSI - SENA - 1438303 G2</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    </head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->idempleado > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idempleado" value="<?php echo $alm->__GET('idempleado'); ?>" />
                    
                   <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="nombre" placeholder="Nombre del empleado" required="" value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Direccion</th>
                            <td><input type="text" name="direccion" placeholder="Direccion" required="" value="<?php echo $alm->__GET('direccion'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Documento</th>
                            <td><input type="text" name="documento" placeholder="Digite su documento" required="" value="<?php echo $alm->__GET('documento'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Telefono</th>
                            <td><input type="text" name="telefono" placeholder="Ingrese su telefono/Celular" required="" value="<?php echo $alm->__GET('telefono'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Correo</th>
                            <td><input type="text" name="email" placeholder="Ingrese su correo" required="" value="<?php echo $alm->__GET('email'); ?>" style="width:100%;" /></td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left;">Tipo de Empleado</th>
                            <td>
                                <select name="didtipoempleado" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new TipoempleadoModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idtipoempleado') ?>"
                                    <?php echo $ta->__GET('idtipoempleado') == $alm->__GET('idtipoempleado') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('cargo') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>
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
                        
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Documento</th>
                            <th style="text-align:left;">Direccion</th>
                            <th style="text-align:left;">Telefono</th>
                            <th style="text-align:left;">Correo</th>
                            <th style="text-align:left;">Cargo</th>
                    
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                          
                            
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('documento'); ?></td>
                            <td><?php echo $r->__GET('direccion'); ?></td>
                            <td><?php echo $r->__GET('telefono'); ?></td>
                            <td><?php echo $r->__GET('email'); ?></td>
                            
                             <td><?php echo $r->__GET('cargo'); ?></td>
                        
                              
                            <td>
                                <a href="?action=editar&idempleado=<?php echo $r->idempleado; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idempleado=<?php echo $r->idempleado; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>