<?php
require_once 'cliente.Entidad.php';
require_once 'cliente.Model.php';
require_once 'tipodocumento.Entidad.php';
require_once 'tipodocumento.Model.php'; 
// Logica de negocio
$alm = new tipodocumento();
$model = new tipodocumentoModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idtd',            $_REQUEST['idtd']);
			$alm->__SET('descripcion',     $_REQUEST['descripcion']);
			
			$model->Actualizar($alm);
			header('Location: tipodocumento.php');
			break;

		case 'registrar':
			$alm->__SET('idtd',            $_REQUEST['idtd']);
            $alm->__SET('descripcion',     $_REQUEST['descripcion']);
            
            $model->Registrar($alm);
            header('Location: tipodocumento.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idtd']);
			header('Location: tipodocumento.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idtd']);
			break;
	}
}
include('seguridad_a.php');
include('seguridad.php');
?>

<!DOCTYPE html>
<html lang="es">
	<head>

     <fieldset><legend><strong><center><font size="5%"> Tipo de Documento</font></center></strong></legend>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:65px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->idtd > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="formulario" style="margin-bottom:30px;">
                    <input type="hidden" name="idtd" value="<?php echo $alm->__GET('idtd'); ?>" />
                    
                    <table style="width:500px;">
                      
                        <tr>
                            <th style="text-align:left;">cliente</th>
                            <td><input type="text" autocomplete="off" name="descripcion" placeholder="Documento Cliente" required value="<?php echo $alm->__GET('descripcion'); ?>" style="width:100%;" /></td>
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
                            
                            <th style="text-align:left;">Documento</th>


                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            
                            <td><?php echo $r->__GET('descripcion'); ?></td>
                            <td>
                                <a href="">Editar</a>
                            </td>
                            <td>
                                <a href="">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
        </div>
<button type="submit" onclick="location.href='principal.html'" class="pure-button pure-button-primary">volver</button>
    </body>
</html>