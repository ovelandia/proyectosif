<?php
require_once 'detalleventa.Entidad.php';
require_once 'detalleventa.Model.php';
require_once 'venta.Model.php';
require_once 'venta.Entidad.php';

// Logica de negocio
$alm = new Detalleventa();
$model = new DetalleventaModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('iddetalleventa',            $_REQUEST['iddetalleventa']);
            $alm->__SET('cantidad',                    $_REQUEST['cantidad']);
           $alm->__SET('total',            $_REQUEST['total']);
           $alm->__SET('didventa',            $_REQUEST['didventa']);
           #$alm->__SET('didproducto',            $_REQUEST['didproducto']);
            
            $model->Actualizar($alm);
            header('Location: detalleventa.php');
            break;

        case 'registrar':
            $alm->__SET('iddetalleventa',            $_REQUEST['iddetalleventa']);
            $alm->__SET('cantidad',                    $_REQUEST['cantidad']);
             $alm->__SET('total',            $_REQUEST['total']);
             $alm->__SET('didventa',            $_REQUEST['didventa']);
			
            #$alm->__SET('didproducto',            $_REQUEST['didproducto']);
             
            $model->Registrar($alm);
            header('Location: detalleventa.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['iddetalleventa']);
            header('Location: detalleventa.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['iddetalleventa']);
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
<title>Detalle Venta</title>
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
                                    <a href="detalleventa.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
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
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Detalle Venta </span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                <div align="center">
                
                <form action="?action=<?php echo $alm->iddetalleventa > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="Formulario" style="margin-bottom:30px;">
                    <input type="hidden" name="iddetalleventa" value="<?php echo $alm->__GET('iddetalleventa'); ?>" />
                    
                    <table width="87%" border="0">
                        <tr>
                            <th style="text-align:left;">Cantidad Productos</th>
                            <td><input type="text" autocomplete="off" name="cantidad" placeholder="cantidad Productos" required value="<?php echo $alm->__GET('cantidad'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Precio Total</th>
                            <td><input type="text" autocomplete="off" name="total" placeholder="Precio del producto en ($)" required value="<?php echo $alm->__GET('total'); ?>" style="width:100%;" /></td>
                        </tr>
					   
                        <tr>
                            <th style="text-align:left;">Fecha Venta</th>
                            <td>
                                <select name="didventa" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new VentaModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idventa') ?>"
                                    <?php echo $ta->__GET('idventa') == $alm->__GET('idventa') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('fecha') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr> 
     
                                </select>
                             </td>
                        </tr>                       
                                           

                        
                    </table>
                    <td width="123"><button type="submit" class="w3-btn w3-red w3-round-xxlarge">Guardar</button> <button align="center" type="submit" onclick="location.href='principalA.html'" class="w3-btn w3-red w3-round-xxlarge">volver</button></td><hr><br>

                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th width="21%" style="text-align:left;">cantidad Productos</th>
                            <th width="15%" style="text-align:left;">Precio Total</th>
                            <th width="16%" style="text-align:left;">Fecha Venta</th>
                            <th width="30%"></th>
                            

                            

                            <th width="15%"></th>
                            <th width="3%"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('cantidad'); ?></td>
                            
                            <td><?php echo $r->__GET('total'); ?></td>
                             <td><?php echo $r->__GET('fecha'); ?></td>
                             <td>&nbsp;</td>
                             
                        
                              
                            <td>
                                <a class="w3-btn w3-blue w3-round-xxlarge" href="?action=editar&iddetalleventa=<?php echo $r->iddetalleventa; ?>">Editar</a>
                            
                                <a class="w3-btn w3-red w3-round-xxlarge" href="?action=eliminar&iddetalleventa=<?php echo $r->iddetalleventa; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>