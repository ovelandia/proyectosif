<?php
require_once 'detallefactura.Entidad.php';
require_once 'detallefactura.Model.php';
require_once 'factura.Entidad.php';
require_once 'factura.Model.php';
require_once 'unidadmedida.Entidad.php';
require_once 'unidadmedida.Model.php';
require_once 'insumos.Entidad.php';
require_once 'insumos.Model.php';



$alm = new Detalle_factura();
$model = new DetallefacturaModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('iddetalle_factura',            $_REQUEST['iddetalle_factura']);
            $alm->__SET('cantidad',                     $_REQUEST['cantidad']);
            $alm->__SET('valor',                        $_REQUEST['valor']);
            $alm->__SET('total',                        $_REQUEST['total']);
            $alm->__SET('didfactura',                        $_REQUEST['didfactura']);
            $alm->__SET('didunidadmedida',                        $_REQUEST['didunidadmedida']);
            $alm->__SET('tidinsumos',                        $_REQUEST['tidinsumos']);
                

            
            $model->Actualizar($alm);
            header('Location: detallefactura.php');
            break;

        case 'registrar':
            $alm->__SET('iddetalle_factura',            $_REQUEST['iddetalle_factura']);
            $alm->__SET('cantidad',                    $_REQUEST['cantidad']);
            $alm->__SET('valor',                       $_REQUEST['valor']);
            $alm->__SET('total',                        $_REQUEST['total']);
            $alm->__SET('didfactura',                        $_REQUEST['didfactura']);
            $alm->__SET('didunidadmedida',                        $_REQUEST['didunidadmedida']);
            $alm->__SET('tidinsumos',                        $_REQUEST['tidinsumos']);

            
            $model->Registrar($alm);
            header('Location: detallefactura.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['iddetalle_factura']);
            header('Location: detallefactura.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['iddetalle_factura']);
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
                                    <a href="detallefactura.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
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
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Detalle Factura </span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">

    <div class="pure-g">
      <div class="pure-u-1-12">
                <form action="?action=<?php echo $alm->iddetalle_factura > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class=Formulario style="margin-bottom:30 px;">
                    <div align="center">
                    <p>
                    <input type="hidden" name="iddetalle_factura" value="<?php echo $alm->__GET('iddetalle_factura'); ?>" />
                    </p>
                    
                     <table width="87%" border="0">

                        <tr>

                        
                            <th class="w3-opacity" style="text-align:left;">Cantidad</th>
                            <td><input type="text" name="cantidad" placeholder="Cantidad del producto" required value="<?php echo $alm->__GET('cantidad'); ?>" style="width:100%;" /></td>
                        </tr>
                         <tr>
                            <th class="w3-opacity"style="text-align:left;">Valor del producto</th>
                            <td><input type="text" name="valor" placeholder="Ingrese valor " required value="<?php echo $alm->__GET('valor'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th class="w3-opacity" style="text-align:left;">Total</th>
                            <td><input type="text" name="total" placeholder="Cantidad" required  value="<?php echo $alm->__GET('total'); ?>" style="width:100%;" /></td>

                        </tr>





                        <tr>
                            <th class="w3-opacity" style="text-align:left;">Factura</th>
                            <td>
                                <select name="didfactura" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new FacturaModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idfactura') ?>"
                                    <?php echo $ta->__GET('idfactura') == $alm->__GET('idfactura') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('fecha_factura') ?></option>
                                    <?php echo $ta->__GET('numero_factura') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                          </td>
                        </tr>


                        <tr>
                            <th class="w3-opacity" style="text-align:lef;">Uni.Medida</th>
                            <td>
                                <select name="didunidadmedida" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new unidadmedidaModel();
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
                            <th class="w3-opacity" style="text-align:left;">Insumos</th>
                            <td>
                                <select name="tidinsumos" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new InsumosModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idinsumos') ?>"
                                    <?php echo $ta->__GET('idinsumos') == $alm->__GET('idinsumos') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('insumo') ?></option>
                                    <?php echo $ta->__GET('cantidad_insumos') ?></option>
                                    <?php endforeach; ?>    


                                </select>
                          </td>

                        

                    </table>
                     <center>  <td width="123"><button type="submit" class="w3-btn w3-red w3-round-xxlarge">Guardar</button> <button align="center" type="submit" onclick="location.href='principalA.html'" class="w3-btn w3-red w3-round-xxlarge">volver</button></td><hr><br><center><center><center></center></center></center></center>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th class="w3-opacity" width="8%" style="text-align: center";>Cantidad</th>
                            <th class="w3-opacity" width="6%" style="text-align:center;">Valor</th>
                            <th class="w3-opacity" width="6%" style="text-align:center;">Total</th>
                            <th class="w3-opacity" width="14%" style="text-align:center;">Fecha de Factura</th>
                            <th class="w3-opacity" width="13%" style="text-align:center;">Numero Factura</th>
                            <th class="w3-opacity" width="12%" style="text-align:center;">Unidad Medida</th>
                            <th class="w3-opacity" width="8%" style="text-align:center">Insumos</th>
                            <th class="w3-opacity" width="16%" style="text-align:center;">Cantidad de insumos</th>
                          

                            

                            <th width="14%"></th>
                            <th width="3%"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('cantidad'); ?></td>
                            <td><?php echo $r->__GET('valor'); ?></td>
                            <td><?php echo $r->__GET('total'); ?></td>
                            <td><?php echo $r->__GET('medida'); ?></td>
                            <td><?php echo $r->__GET('numero_factura'); ?></td>
                            <td><?php echo $r->__GET('medida'); ?></td>
                            <td><?php echo $r->__GET('insumo'); ?></td>
                            <td><?php echo $r->__GET('cantidad_insumos'); ?></td>
                            
                              
                            <td>
                                <a class="w3-btn w3-gray w3-round-xxlarge" href="?action=editar&iddetalle_factura=<?php echo $r->iddetalle_factura; ?>">Editar</a>
                            
                                <a class="w3-btn w3-red w3-round-xxlarge"  href="?action=eliminar&iddetalle_factura=<?php echo $r->iddetalle_factura; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
        </div>
    </body>
</html>