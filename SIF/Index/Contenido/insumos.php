<?php
require_once 'insumos.Entidad.php';
require_once 'insumos.Model.php';
require_once 'unidadmedida.Entidad.php';
require_once 'unidadmedida.Model.php';
require_once 'categoria.Entidad.php';
require_once 'categoria.Model.php';

$alm = new Insumos();
$model = new InsumosModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idinsumos',            $_REQUEST['idinsumos']);
			$alm->__SET('insumo',         $_REQUEST['insumo']);
            $alm->__SET('cantidad_insumos',         $_REQUEST['cantidad_insumos']);
            $alm->__SET('tidunidadmedida',         $_REQUEST['tidunidadmedida']);
            $alm->__SET('cidcategoria',         $_REQUEST['cidcategoria']);
			
			$model->Actualizar($alm);
			header('Location: insumos.php');
			break;

		case 'registrar':
			$alm->__SET('idinsumos',            $_REQUEST['idinsumos']);
            $alm->__SET('insumo',         $_REQUEST['insumo']);
            $alm->__SET('cantidad_insumos',         $_REQUEST['cantidad_insumos']);
            $alm->__SET('tidunidadmedida',         $_REQUEST['tidunidadmedida']);
            $alm->__SET('cidcategoria',         $_REQUEST['cidcategoria']);
            
            $model->Registrar($alm);
            header('Location: insumos.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idinsumos']);
			header('Location: insumos.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idinsumos']);
			break;
	}
}
include('seguridad_a.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
<style type="text/css">
.pure-g .pure-u-1-12 .Formulario div table tr th div {
    font-family: Georgia, "Times New Roman", Times, serif;
}
.detallefactura {
    font-weight: bold;
}
</style>
<head>
<title>Insumos</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
    <body>

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Main -->
                    <div id="main">
                        <div class="inner">

                            <!-- Header -->
                                <header id="header">
                                    <a href="insumos.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
                                    <ul class="icons">
                                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                                        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                                        <button align="center"  onclick="location.href='salir.php'" class="w3-btn w3-red w3-round-xxlarge">Cerrar Sesion</button>
                                </header>

                            <!-- Content -->
                                <section>
                                    
    
        <link rel="stylesheet" href="sif.css">
        <style type="text/css">
        .pure-g .pure-u-1-12 .w3-table.w3-RED {
    text-align: center;
}
        .pure-g .pure-u-1-12 .w3-table.w3-RED {
    text-align: center;
}
        .pure-g .pure-u-1-12 .Formulario div table {
    text-align: center;
}
        </style>
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Insumos</span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                <form action="?action=<?php echo $alm->idinsumos > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idinsumos" value="<?php echo $alm->__GET('idinsumos'); ?>" />
                    
                  <table width="87%" border="0">
                      
                    <tr>
                            <th style="text-align:left;">Insumo:</th>
                            <td><input type="text" autocomplete="off" name="insumo" placeholder="insumo de la Categoria" required value="<?php echo $alm->__GET('insumo'); ?>" style="width:100%;" /></td>
                    </tr>
                        <tr>
                            <th style="text-align:left;">Cantidad de insumos:</th>
                            <td><input type="text" autocomplete="off" name="cantidad_insumos" placeholder="insumo de la Categoria" required value="<?php echo $alm->__GET('cantidad_insumos'); ?>" style="width:100%;" /></td>
                        </tr>


                            <tr>
                            <th style="text-align:left;">Unidad de Medida</th>
                            <td>
                                <select name="tidunidadmedida" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new UnidadmedidaModel();
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
                            <th style="text-align:left;">Categoria</th>
                            <td>
                                <select name="cidcategoria" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new CategoriaModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idcategoria') ?>"
                                    <?php echo $ta->__GET('idcategoria') == $alm->__GET('idcategoria') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('nombre') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                          </td>
                        </tr>
                  </table>
                  <td width="123"><button type="submit" class="w3-btn w3-red w3-round-xxlarge">Guardar</button> <button align="center" type="submit" onclick="location.href='principalA.html'" class="w3-btn w3-red w3-round-xxlarge">volver</button></td><br><br>
                </form>

                <table class="pure-table pure-table-horizontal">
                   
                        <tr>
                            <th width="12%" style="text-align:left;">insumo</th>
                            <th width="20%" style="text-align:left;">cantidad Insumos</th>
                            <th width="12%" style="text-align:left;">Medida</th>
                            <th width="15%" style="text-align:left;">Categoria</th>
                            <th width="12%" style="text-align:left;">&nbsp;</th>
                            <th width="15%" style="text-align:left;">&nbsp;</th>

                        </tr>
                    </thead>
                        
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            
                            <td><?php echo $r->__GET('insumo'); ?></td>
                            <td><?php echo $r->__GET('cantidad_insumos'); ?></td>
                            <td><?php echo $r->__GET('medida'); ?></td>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td width="14%"><a class="w3-btn w3-gray w3-round-xxlarge" href="?action=editar&idinsumos=<?php echo $r-> 				 								idinsumos; ?>">Editar</a> 
                                <a class="w3-btn w3-red w3-round-xxlarge" href="?action=eliminar&idinsumos=<?php echo $r->idinsumos; ?>">Eliminar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
        </div>

    </body>
</html>