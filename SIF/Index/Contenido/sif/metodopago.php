<?php
require_once 'metodopago.Entidad.php';
require_once 'metodopago.Model.php';

// Logica de negocio
$alm = new Metodopago();
$model = new MetodopagoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('idmetododepago',            $_REQUEST['idmetododepago']);
            $alm->__SET('metododepago',                    $_REQUEST['metododepago']);
            
            $model->Actualizar($alm);
            header('Location: metodopago.php');
            break;

        case 'registrar':
            $alm->__SET('idmetodopago',            $_REQUEST['idmetododepago']);
            $alm->__SET('metododepago',                    $_REQUEST['metododepago']);
           
            
            $model->Registrar($alm);
            header('Location: metodopago.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idmetododepago']);
            header('Location: metodopago.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idmetododepago']);
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
                
                <fieldset><legend><strong><font size="5px"> Formulario de metodo de pago</font></strong></legend>
                <form action="?action=<?php echo $alm->idmetododepago > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:10px;">
                    <input type="hidden" name="idmetododepago" value="<?php echo $alm->__GET('idmetododepago'); ?>" />
                    
                   <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Metodo de pago</th>
                            <td><input type="text" name="metododepago" placeholder="Ingrese el Metodo de Pago" required="" value="<?php echo $alm->__GET('metododepago'); ?>" style="width:100%;" /></td>
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
                            <th style="text-align:left;">Metodo de Pago</th>
                            
                            

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('metododepago'); ?></td>
                         
                              
                            <td>
                                <a href="?action=editar&idmetododepago=<?php echo $r->idmetododepago; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idmetododepago=<?php echo $r->idmetododepago; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
        </div>

    </body>
</html>