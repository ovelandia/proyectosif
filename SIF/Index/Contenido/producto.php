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
            $alm->__SET('nombre',                    $_REQUEST['nombre']);
            $alm->__SET('preciounitario',            $_REQUEST['preciounitario']);
            $alm->__SET('cantidad',            $_REQUEST['cantidad']);
            $alm->__SET('total',            $_REQUEST['total']);
         
        
            
            $model->Actualizar($alm);
            header('Location: producto.php');
            break;

        case 'registrar':
           $alm->__SET('idproducto',            $_REQUEST['idproducto']);
            $alm->__SET('nombre',                    $_REQUEST['nombre']);
            $alm->__SET('preciounitario',            $_REQUEST['preciounitario']);
            $alm->__SET('cantidad',            $_REQUEST['cantidad']);
            $alm->__SET('total',            $_REQUEST['total']);
          
      

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
                                    <a href="producto.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
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
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Productos</span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                <form action="?action=<?php echo $alm->idproducto > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idproducto" value="<?php echo $alm->__GET('idproducto'); ?>" />
                    
                    <table width="87%" border="0">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" autocomplete="off" name="nombre" placeholder="nombre" required value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                         <tr>
                            <th style="text-align:left;">Preciounitario</th>
                            <td><input type="text" autocomplete="off" name="preciounitario" placeholder="precio unitario " required value="<?php echo $alm->__GET('preciounitario'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Cantidad</th>
                            <td><input type="text" autocomplete="off" name="cantidad" placeholder="Cantidad" required  value="<?php echo $alm->__GET('cantidad'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Total</th>
                            <td><input type="text" autocomplete="off" name="total" placeholder="total" required  value="<?php echo $alm->__GET('total'); ?>" style="width:100%;" /></td>
                        </tr>
                        
                      
                                           

                        <tr>
                            
                  </table>
                     <td width="123"><button type="submit" class="w3-btn w3-red w3-round-xxlarge">Guardar</button> <button align="center" type="submit" onclick="location.href='principalA.html'" class="w3-btn w3-red w3-round-xxlarge">volver</button></td><hr><br>
                    
                </form>

                <table width="515" class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th width="134" style="text-align:left;">Nombre</th>
                            <th width="202" style="text-align:left;">Preciounitario</th>
                            <th width="161" style="text-align:left;">Cantidad</th>
                            <th width="161" style="text-align:left;">Total</th>
                            
                            <th width="170"></th>
                          

                            

                            <th width="119"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('preciounitario'); ?></td>
                            <td><?php echo $r->__GET('cantidad'); ?></td>
                            <td><?php echo $r->__GET('total'); ?></td>
                        
                            <td>&nbsp;</td>
                            
                              
                            <td><a class="w3-btn w3-gray w3-round-xxlarge" href="?action=editar&idproducto=<?php echo $r->idproducto; ?>">Editar</a> <a class="w3-btn w3-red w3-round-xxlarge"href="?action=eliminar&idproducto=<?php echo $r->idproducto; ?>">Eliminar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>