<?php
require_once 'producto.entidad.php';
require_once 'producto.model.php';

// Logica de negocio
$alm = new Producto();
$model = new ProductoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('idproducto',            $_REQUEST['idproducto']);
            $alm->__SET('desc_prod',                    $_REQUEST['desc_prod']);
            $alm->__SET('precio',            $_REQUEST['precio']);
           

         
        
            
            $model->Actualizar($alm);
            header('Location: producto.php');
            break;

        case 'registrar':
            $alm->__SET('idproducto',            $_REQUEST['idproducto']);
            $alm->__SET('desc_prod',                    $_REQUEST['desc_prod']);
            $alm->__SET('precio',            $_REQUEST['precio']);
          
                
      

            $model->Registrar($alm);
            header('Location: producto.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idproducto']);
            header('Location: producto.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idproducto']);
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
.n {
	font-weight: bold;
}
</style>
<head>
<title>Productos</title>
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
                                    <a href="producto.php" class="logo"><strong>Administrador</a></strong>
                                    
                                    
                                    <ul class="icons">
                                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
   
                                        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                                        <button align="center"  onclick="location.href='../ingreso.html'" class="w3-btn w3-red w3-round-xxlarge">Cerrar Sesion</button>
                                        <button align="center" type="submit" onclick="location.href='principalA.html'" class="w3-btn w3-red w3-round-xxlarge">volver</button>
                                </header>

                            <!-- Content -->
                                <section>



    
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    </legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
               
            <strong><font class="w3-opacity" size="15%" style="color:red;"><span class="detallefactura">Lista productos</span></font></strong><hr>

                <table width="20%" class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th width="312" style="text-align:left;">Nombre</th>
                            <th width="307" style="text-align:left;">Precio unitario</th>
                            <th width="204"></th>
                            <th width="127"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('desc_prod'); ?></td>
                            <td><?php echo $r->__GET('precio'); ?></td>
                             <td>&nbsp;</td>
                            <td><a class="w3-btn w3-blue w3-round-xxlarge"  href='producto.php'"? href="?action=editar&idproducto=<?php echo $r->idproducto; ?>">Editar</a>
                            <a class="w3-btn w3-red w3-round-xxlarge"href="?action=eliminar&idproducto=<?php echo $r->idproducto; ?>">Eliminar</a></td>


                        </tr>
                    <?php endforeach; ?>
                </table>    
                <button align="center" type="submit" onclick="location.href='producto.php'" class="w3-btn w3-red w3-round-xxlarge">Agregar</button> 
              
            </div>
        </div>

    </body>
</html>