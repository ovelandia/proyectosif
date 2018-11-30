<?php
require_once 'venta.Entidad.php';
require_once 'venta.Model.php';
require_once 'Cliente.Entidad.php';
require_once 'Cliente.Model.php';
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
<style type="text/css">
.pure-g .pure-u-1-12 .Formulario div table tr th div {
    font-family: Georgia, "Times New Roman", Times, serif;
}
.detallefactura {
    font-weight: bold;
}
</style>
<head>
<title> Venta</title>
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
                                    <a href="venta_e.php" class="logo"><strong>Modo Empleado</a></strong>
                                    
                                    
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
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Venta </span></font><br><hr>
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th width="30%" style="text-align:left;">Fecha</th>
                            
                            <th width="30%" style="text-align:left;">Nombre</th>
                            <th width="30%" style="text-align:left;">Empleado</th>
                            <th width="19%" style="text-align:left;">Tipo Venta</th>
                            <th width="18%"></th>
                            

                            

                            <th width="16%"></th>
                            <th width="2%"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('fecha'); ?></td>
                            
                            <td><?php echo $r->__GET('nombre'); ?></td>
                             <td><?php echo $r->__GET('cargo'); ?></td>
                             <td><?php echo $r->__GET('tipoventa'); ?></td>
                             <td>&nbsp;</td>
                        
                              
                            <td>
                             
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
                <button align="center" type="submit" onclick="location.href='principalE.html'" class="w3-btn w3-red
                 w3-round-xxlarge">volver</button>
              
            </div>
        </div>

    
    </body>
</html>