<?php
require_once 'tipoventa.Entidad.php';
require_once 'tipoventa.Model.php';

// Logica de negocio
$alm = new Tipoventa();
$model = new TipoventaModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('idtipoventa',            $_REQUEST['idtipoventa']);
            $alm->__SET('tipoventa',                    $_REQUEST['tipoventa']);
        
        
            
            $model->Actualizar($alm);
            header('Location: tipoventa.php');
            break;

        case 'registrar':
            $alm->__SET('idtipoventa',            $_REQUEST['idtipoventa']);
            $alm->__SET('tipoventa',                    $_REQUEST['tipoventa']);
           
            
            
            $model->Registrar($alm);
            header('Location: tipoventa.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idtipoventa']);
            header('Location: tipoventa.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idtipoventa']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>

     <fieldset><legend><strong><center><font size="5%">Formulario de Tipo Venta</font></center></strong></legend>

        <title>ADSI - SENA - 1438303 G2</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    </head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->idtipoventa > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idtipoventa" value="<?php echo $alm->__GET('idtipoventa'); ?>" />
                    
                   <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">tipoventa</th>
                            <td><input type="text" name="tipoventa" placeholder="tipoventa" required="" value="<?php echo $alm->__GET('tipoventa'); ?>" style="width:100%;" /></td
                        
                                           

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
                            <th style="text-align:left;">Tipoventa</th>
                            

                            

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('tipoventa'); ?></td>
                            
                            
                              
                            <td>
                                <a href="?action=editar&idtipoventa=<?php echo $r->idtipoventa; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idtipoventa=<?php echo $r->idtipoventa; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
        </div>

    </body>
</html>