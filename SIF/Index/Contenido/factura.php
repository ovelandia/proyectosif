<?php
require_once 'factura.Entidad.php';
require_once 'factura.Model.php';
require_once 'distribuidor.Entidad.php';
require_once 'distribuidor.Model.php';

$alm = new Factura();
$model = new FacturaModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idfactura',            $_REQUEST['idfactura']);
			$alm->__SET('fecha_factura',         $_REQUEST['fecha_factura']);
            $alm->__SET('numero_factura',         $_REQUEST['numero_factura']);
            $alm->__SET('tiddistribuidor',         $_REQUEST['tiddistribuidor']);
            $alm->__SET('nombre',         $_REQUEST['nombre']);
            $alm->__SET('telefono',         $_REQUEST['telefono']);
            $alm->__SET('direccion',         $_REQUEST['direccion']);
            $alm->__SET('nit',         $_REQUEST['nit']);
                       
            

			
			$model->Actualizar($alm);
			header('Location: factura.php');
			break;

		case 'registrar':
			$alm->__SET('idfactura',            $_REQUEST['idfactura']);
            $alm->__SET('fecha_factura',         $_REQUEST['fecha_factura']);
            $alm->__SET('numero_factura',         $_REQUEST['numero_factura']);
            $alm->__SET('tiddistribuidor',         $_REQUEST['tiddistribuidor']);
			$alm->__SET('nombre',         $_REQUEST['nombre']);
            $alm->__SET('telefono',         $_REQUEST['telefono']);
            $alm->__SET('direccion',         $_REQUEST['direccion']);
            $alm->__SET('nit',         $_REQUEST['nit']);
            

            $model->Registrar($alm);
            header('Location: factura.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idfactura']);
			header('Location: factura.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idfactura']);
			
			break;
	}
}

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
<title>Factura</title>
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
                                    <a href="factura.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
                                    <ul class="icons">
                                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
    
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
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Factura</span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                <form action="?action=<?php echo $alm->idfactura > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="formulario" style="margin-bottom:30px;">
                    <input type="hidden" name="idfactura" value="<?php echo $alm->__GET('idfactura'); ?>" />
                    
                  <table width="87%" border="0">
                        <tr>
                            <th style="text-align:left;">Fecha de la factura</th>
                            <td><input type="date" name="fecha_factura" placeholder="Fecha de la factura" required value="<?php echo $alm->__GET('fecha_factura'); ?>" style="width:100%;" /></td>
                        </tr>
                         <tr>
                            <th style="text-align:left;"># De factura</th>
                            <td><input type="TEXT" autocomplete="off" name="numero_factura" placeholder="Numero de la factura " required value="<?php echo $alm->__GET('numero_factura'); ?>" style="width:100%;" /></td>
                        </tr>
                      <tr>
                            <th style="text-align:left;">Distribuidor</th>
                            <td>
                                <select name="tiddistribuidor" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new DistribuidorModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('iddistribuidor') ?>"
                                    <?php echo $ta->__GET('iddistribuidor') == $alm->__GET('iddistribuidor') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('nombre') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Nombre distribuidor</th>
                            <td><input type="TEXT" autocomplete="off" name="nombre" placeholder="nombre " required value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Telefono</th>
                            <td><input type="TEXT" autocomplete="off" name="telefono" placeholder="telefono " required value="<?php echo $alm->__GET('telefono'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Direccion</th>
                            <td><input type="TEXT" autocomplete="off" name="direccion" placeholder="direccion" required value="<?php echo $alm->__GET('direccion'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Nit</th>
                            <td><input type="TEXT" autocomplete="off" name="nit" placeholder="nit " required value="<?php echo $alm->__GET('nit'); ?>" style="width:100%;" /></td>
                        </tr>
                    </table> 
                      <td width="123"><button type="submit" class="w3-btn w3-red w3-round-xxlarge">Guardar</button> <button align="center" type="submit" onclick="location.href='principalA.html'" class="w3-btn w3-red w3-round-xxlarge">volver</button></td><hr><br>
                </form>

                <table width="97%" class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th width="13%" style="text-align:left;">Fecha de la Factura</th>
                            <th width="13%" style="text-align:left;">Numero de factura</th>

                            <th width="17%" style="text-align:left;">Nombre del Distribuidor </th>
                            <th width="13%" style="text-align:left;">Telefono del distribuidor</th>
                            <th width="17%" style="text-align:left;">Direccion del distrubuidor</th>
                            <th width="12%" style="text-align:left;">Nit del distribuidor</th>
                          

                            

                            <th width="15%"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('fecha_factura'); ?></td>
                            <td><?php echo $r->__GET('numero_factura'); ?></td>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('telefono'); ?></td>
                            <td><?php echo $r->__GET('direccion'); ?></td>
                            <td><?php echo $r->__GET('nit'); ?></td>
                            
                            
                              
                            <td><a  class="w3-btn w3-gray w3-round-xxlarge" href="?action=editar&idfactura=							 							<?php  echo $r->idfactura; ?>">Editar    </a>
                            <a  class="w3-btn w3-red w3-round-xxlarge" href="?action=eliminar&idfactura=<?php 							echo $r->idfactura; ?>">Eliminar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
        </div>

    </body>
</html>