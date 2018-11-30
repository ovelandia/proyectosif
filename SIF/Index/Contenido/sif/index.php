<?php
require_once 'Instructor.Entidad.php';
require_once 'Instructor.Model.php';
require_once 'tipodocumento.entidad.php';
require_once 'tipodocumento.model.php';
require_once 'Genero.Entidad.php';
require_once 'Genero.Model.php';



// Logica de negocio
$alm = new Instructor();
$model = new InstructorModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('Id',              $_REQUEST['Id']);
			$alm->__SET('nombre',          $_REQUEST['nombre']);
			$alm->__SET('apellido',        $_REQUEST['apellido']);
            $alm->__SET('tipodocu',        $_REQUEST['tipodocu']);
            $alm->__SET('documento',       $_REQUEST['documento']);
			$alm->__SET('genero',          $_REQUEST['genero']);
			$alm->__SET('direccion',       $_REQUEST['direccion']);
            $alm->__SET('ciudad',          $_REQUEST['ciudad']);
            $alm->__SET('telefono',        $_REQUEST['telefono']);

			$model->Actualizar($alm);
			header('Location: index.php');
			break;

		case 'registrar':
			$alm->__SET('nombre',          $_REQUEST['nombre']);
            $alm->__SET('apellido',        $_REQUEST['apellido']);
            $alm->__SET('tipodocu',        $_REQUEST['tipodocu']);
            $alm->__SET('documento',       $_REQUEST['documento']);
            $alm->__SET('genero',          $_REQUEST['genero']);
            $alm->__SET('direccion',       $_REQUEST['direccion']);
            $alm->__SET('ciudad',          $_REQUEST['ciudad']);
            $alm->__SET('telefono',        $_REQUEST['telefono']);
            

			$model->Registrar($alm);
			header('Location: index.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['Id']);
			header('Location: index.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['Id']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>

    <fieldset ><legend><strong><center><font size="5%">Formulario del Cliente</font></center></strong></legend>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->Id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="Id" value="<?php echo $alm->__GET('Id'); ?>" />
                    
                    <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="nombre" placeholder="Nombre Instructor" required="" value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Apellidos</th>
                            <td><input type="text" name="apellido" placeholder="Apellidos Instructor" required="" value="<?php echo $alm->__GET('apellido'); ?>" style="width:100%;" /></td>
                        </tr>

                        <tr>
                            <th style="text-align:left;">Tipo Doc.</th>
                            <td>
                                <select name="tipodocu" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tdoc = new TipodocumentoModel();
                                        foreach($tdoc->Listar() as $td):
                                    ?>
                                    <option value="<?php echo $td->__GET('idtd') ?>"
                                    <?php echo $td->__GET('idtd') == $alm->__GET('idtd') ? 'selected' : ''?>>
                                    <?php echo $td->__GET('descripcion') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left;">Documento</th>
                            <td><input type="text" name="documento" placeholder="Documento Instructor" required="" value="<?php echo $alm->__GET('documento'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Genero</th>
                            <td>
                                <select name="genero" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tgen = new GeneroModel();
                                        foreach($tgen->Listar() as $tg):
                                    ?>
                                    <option value="<?php echo $tg->__GET('Idgen') ?>"
                                    <?php echo $tg->__GET('Idgen') == $alm->__GET('Idgen') ? 'selected' : ''?>>
                                    <?php echo $tg->__GET('descgenn') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>

                        <tr>
                            <th style="text-align:left;">Dirección</th>
                            <td><input type="text" name="direccion" placeholder="Dirección Instructor" required  value="<?php echo $alm->__GET('direccion'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Ciudad</th>
                            <td><input type="text" placeholder="Ciudad Instructor" required="" name="ciudad" value="<?php echo $alm->__GET('ciudad'); ?>" style="width:100%;" /></td>
                        </tr>
                      
                        <tr>
                            <th style="text-align:left;">Telefono</th>
                            <td><input type="number" name="telefono" placeholder="Telefono Instructor" required="" value="<?php echo $alm->__GET('telefono'); ?>" style="width:100%;" /></td>
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
                            <th style="text-align:left;">Apellidos</th>
                            <th style="text-align:left;">Tipo</th>
                            <th style="text-align:left;">Documento</th>
                            <th style="text-align:left;">Sexo</th>
                            <th style="text-align:left;">Dirección</th>
                            <th style="text-align:left;">Ciudad</th>
                            <th style="text-align:left;">Teléfono</th>
                            

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('apellido'); ?></td>
                            <td><?php echo $r->__GET('descripcion'); ?></td>
                            <td><?php echo $r->__GET('documento'); ?></td>
                            <td><?php echo $r->__GET('descgenn'); ?></td>
                            <td><?php echo $r->__GET('direccion'); ?></td>
                            <td><?php echo $r->__GET('ciudad'); ?></td>
                            <td><?php echo $r->__GET('telefono'); ?></td>
                            
                            <td>
                                <a href="?action=editar&Id=<?php echo $r->Id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&Id=<?php echo $r->Id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>