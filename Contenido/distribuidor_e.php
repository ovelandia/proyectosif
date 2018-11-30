<?php
require_once 'distribuidor.entidad.php';
require_once 'distribuidor.model.php';

// Logica de negocio
$alm = new Distribuidor();
$model = new DistribuidorModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('iddistribuidor',            $_REQUEST['iddistribuidor']);
			$alm->__SET('nombre',                    $_REQUEST['nombre']);
            $alm->__SET('telefono',            $_REQUEST['telefono']);
            $alm->__SET('direccion',            $_REQUEST['direccion']);
            $alm->__SET('nit',            $_REQUEST['nit']);
			
			$model->Actualizar($alm);
			header('Location: distribuidor.php');
			break;

		case 'registrar':
			$alm->__SET('iddistribuidor',            $_REQUEST['iddistribuidor']);
            $alm->__SET('nombre',                    $_REQUEST['nombre']);
            $alm->__SET('telefono',            $_REQUEST['telefono']);
            $alm->__SET('direccion',            $_REQUEST['direccion']);
            $alm->__SET('nit',            $_REQUEST['nit']);
            
            $model->Registrar($alm);
            header('Location: distribuidor.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['iddistribuidor']);
			header('Location: distribuidor.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['iddistribuidor']);
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
<title>Detalle Factura</title>
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
                                    <a href="distribuidor_e.php" class="logo"><strong>Modo Empleado</a></strong>
                                    
                                    
                                    <ul class="icons">
                                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>

                                        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                                        <button align="center"  onclick="location.href='construccion.html'" class="w3-btn w3-red w3-round-xxlarge">Cerrar Sesion</button>
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
    <center>
      <font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Registrar Distribuidor</span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">

    <div class="pure-g">
    <div class="pure-u-1-12">
      <form action="?action=<?php echo $alm->iddistribuidor > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="iddistribuidor" value="<?php echo $alm->__GET('iddistribuidor'); ?>" />
                    
                    <table width="87%" border="0">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" autocomplete="off"- name="nombre" placeholder="Nombre Distribuidor" required value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                         <tr>
                            <th style="text-align:left;">Telefono</th>
                            <td><input type="text" autocomplete="off" name="telefono" placeholder="Telefono Distribuidor" required value="<?php echo $alm->__GET('telefono'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Dirección</th>
                            <td><input type="text" autocomplete="off" name="direccion" placeholder="Dirección Instructor" required  value="<?php echo $alm->__GET('direccion'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">NIT</th>
                            <td><input type="text" autocomplete="off" name="nit" placeholder="nit del distribuidor" required value="<?php echo $alm->__GET('nit'); ?>" style="width:100%;" /></td>
                        </tr>
                  </table>
                 <center>  <td width="123"><button type="submit" class="w3-btn w3-red w3-round-xxlarge">Guardar</button> <button align="center" type="submit" onclick="location.href='principalE.html'" class="w3-btn w3-red w3-round-xxlarge">volver</button></td><hr><br><center><center><center></center></center></center></center>
               
                </form><br><hr>
                 <center>
                 <font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Lista Distribuidores</span></font> 
                </center><br><br><br>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th width="30%" style="text-align:left;">Nombre</th>
                            <th width="30%" style="text-align:left;">Telefono</th>
                            <th width="30%" style="text-align:left;">Direccion</th>
                            <th width="30%" style="text-align:left;">NIT</th>
                            <th width="40%"></th>

                            

                            <th width="15%"></th>
                            <th width="3%"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('telefono'); ?></td>
                            <td><?php echo $r->__GET('direccion'); ?></td>
                            <td><?php echo $r->__GET('nit'); ?></td>
                            <td>&nbsp;</td>
                              
                            <td>
                           
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            
        </div>

    </body>
</html>