<?php
require_once 'productohasinsumos.Entidad.php';
require_once 'productohasinsumos.Model.php';
require_once 'producto.Entidad.php';
require_once 'producto.Model.php';
require_once 'insumos.Model.php';
require_once 'insumos.Entidad.php';

// Logica de negocio
$alm = new Productohas();
$model = new ProductohasModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
        $alm->__SET('idproductohas',            $_REQUEST['idproductohas']);
            $alm->__SET('phinsumos',            $_REQUEST['phinsumos']);
            $alm->__SET('phproducto',           $_REQUEST['phproducto']);
            
            $model->Actualizar($alm);
            header('Location: productohasinsumos.php');
            break;


        case 'registrar':
            
            $alm->__SET('phinsumos',             $_REQUEST['phinsumos']);
            $alm->__SET('phproducto',            $_REQUEST['phproducto']);
            $model->Registrar($alm);
            header('Location: productohasinsumos.php');
            break;

             case 'eliminar':
            $model->Eliminar($_REQUEST['idproductohas']);
            
            header('Location: productohasinsumos.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idproductohas']);

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
<title>Productos e Insumos</title>
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
    <a href="productohasinsumos.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
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
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Productos e Insumos</span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                <form action="?action=<?php echo $alm->idproductohas > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idproductohas" value="<?php echo $alm->__GET('idproductohas'); ?>" />
                
            
                    
                   <table width="91%" border="0">
                      
                        <tr>
                            <th width="21%" style="text-align:left;">Producto</th>
                            <td width="79%">
                                <select name="phproducto" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new ProductoModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idproducto') ?>"
                                    <?php echo $ta->__GET('idproducto') == $alm->__GET('idproducto') ? 'selected' : ''?>
                                    <?php echo $ta->__GET('nombre') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                          </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Insumos</th>
                            <td>
                                <select name="phinsumos" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $temp = new InsumosModel();
                                        foreach($temp->Listar() as $te):
                                    ?>
                                    <option value="<?php echo $te->__GET('idinsumos') ?>"
                                    <?php echo $te->__GET('idinsumos') == $alm->__GET('idinsumos') ? 'selected' : ''?>>
                                    <?php echo $te->__GET('insumo') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                          </td>
                  </table>
                  <div> 
                  <button type="submit" class="w3-btn w3-round-xxlarge">Guardar</button>
                  </form>
                  </div>
                  <button align="center" type="buton" onclick="location.href='principal.html'"class="w3-btn w3-round-xxlarge">volver</button>
                  
                


                <table class="pure-table pure-table-horizontal">
                    <thead>

                        <tr>
                            <th width="26%" style="text-align:left;">Producto</th>
                            
                            <th width="42%" style="text-align:left;">Insumo</th>
                            <th width="18%"></th>
                            <th width="14%"></th>
                       
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            
                            <td><?php echo $r->__GET('insumo'); ?></td>
                        
                       <td>&nbsp;</td>
                            <td>
                            
                                <a  class="w3-btn w3-round-xxlarge" href="?action=editar&idproductohas=<?php echo $r->idproductohas; ?>">Editar</a> 
                                <a  class="w3-btn w3-round-xxlarge" href="?action=eliminar&idproductohas=<?php echo $r-> 	  
								idproductohas; ?>">Eliminar</a>
                            </td>
                              
                      </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

</body>
</html>