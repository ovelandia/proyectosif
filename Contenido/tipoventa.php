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
<style type="text/css">
.pure-g .pure-u-1-12 .Formulario div table tr th div {
    font-family: Georgia, "Times New Roman", Times, serif;
}
.detallefactura {
    font-weight: bold;
}
</style>
<head>
<title>Tipo Venta</title>
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
                                    <a href="tipoventa.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
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
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Tipo Venta</span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                
                <form action="?action=<?php echo $alm->idtipoventa > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="formulario" style="margin-bottom:30px;">
                    <input type="hidden" name="idtipoventa" value="<?php echo $alm->__GET('idtipoventa'); ?>" />
                    
                   <table width="87%" border="0">
                        <tr>
                            <th style="text-align:left;">Tipo Venta</th>
                            <td><input type="text" name="tipoventa" placeholder="tipoventa" required value="<?php echo $alm->__GET('tipoventa'); ?>" style="width:100%;" /></td
                        
                     ></td>
                        </tr>
                    </table>
                    <td width="123"><button type="submit"class="w3-btn w3-round-xxlarge">Guardar</button> <button align="center" type="submit" onclick="location.href='principal.html'"  class="w3-btn w3-round-xxlarge">volver</button></td><hr><br>

                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th width="37%" style="text-align:left;">Tipoventa</th>
                            

                            

                            <th width="49%"></th>
                            <th width="14%"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('tipoventa'); ?></td>
                            
                            
                              
                            <td>&nbsp;</td>
                            <td>
                                <a   class="w3-btn w3-round-xxlarge"href="?action=editar&idtipoventa=<?php echo $r->idtipoventa; ?>">Editar</a> 
                                <a   class="w3-btn w3-round-xxlarge" href="?action=eliminar&idtipoventa=<?php echo $r->idtipoventa; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
 
    </body>
</html>