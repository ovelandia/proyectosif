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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                                    <a href="venta.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
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
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Venta </span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                <form action="?action=<?php echo $alm->idventa > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idventa" value="<?php echo $alm->__GET('idventa'); ?>" />
                    
                    <table width="87%" border="0">
                        <tr>
                            <th style="text-align:left;">Fecha</th>
                            <td><input type="date" autocomplete="off" name="fecha" placeholder="Fecha Actividad" required value="<?php echo $alm->__GET('fecha'); ?>" style="width:100%;" /></td>
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
                    </table>
                     <td width="123"><button type="submit" class="w3-btn w3-red w3-round-xxlarge">Guardar</button> <button align="center" type="submit" onclick="location.href='principalA.html'" class="w3-btn w3-red w3-round-xxlarge" > volver</button></td><hr><br>
                    
                </form>
               

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th width="13%" style="text-align:left;">Fecha</th>
                            
                            <th width="15%"  style="text-align:left;">Nombre</th>
                            <th width="17%" style="text-align:left;">Empleado</th>
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
                                <a  class="w3-btn w3-gray w3-round-xxlarge" href="?action=editar&idventa=<?php echo $r->idventa; ?>">Editar</a>
                           
                                <a  class="w3-btn w3-red w3-round-xxlarge" href="?action=eliminar&idventa=<?php echo $r->idventa; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    
    </body>
</html>