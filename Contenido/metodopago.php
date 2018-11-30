<?php
require_once 'metodopago.Entidad.php';
require_once 'metodopago.Model.php';

// Logica de negocio
$alm = new Metodopago();
$model = new MetodopagoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('idmetododepago',            $_REQUEST['idmetododepago']);
            $alm->__SET('metododepago',                    $_REQUEST['metododepago']);
            
            $model->Actualizar($alm);
            header('Location: metodopago.php');
            break;

        case 'registrar':
            $alm->__SET('idmetodopago',            $_REQUEST['idmetododepago']);
            $alm->__SET('metododepago',                    $_REQUEST['metododepago']);
           
            
            $model->Registrar($alm);
            header('Location: metodopago.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idmetododepago']);
            header('Location: metodopago.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idmetododepago']);
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
<title>Metodo de pago</title>
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
                                    <a href="metodopago.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
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
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Metodo de pago</span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                <form action="?action=<?php echo $alm->idmetododepago > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:10px;">
                    <input type="hidden" name="idmetododepago" value="<?php echo $alm->__GET('idmetododepago'); ?>" />
                    
                  <table width="87%" border="0">
                        <tr>
                            <th width="20%" style="text-align:left;">Metodo de pago</th>
                            <td width="80%"><input type="text" name="metododepago" placeholder="Ingrese el Metodo de Pago" required value="<?php echo $alm->__GET('metododepago'); ?>" style="width:100%;" /></td>
                        </tr>
                  </table>
                      <td width="123"><button type="submit" class="w3-btn w3-round-xxlarge">Guardar</button> <button align="center" type="submit" onclick="location.href='principal.html'"class="w3-btn w3-round-xxlarge">volver</button></td><hr><br>
                </form>

                <table width="86%" class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th width="61%" style="text-align:left;"><div align="center">Metodo de Pago</div></th>
                            
                            

                            <th width="39%"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><div align="center"><?php echo $r->__GET('metododepago'); ?></div></td>
                         
                              
                            <td><a  class="w3-btn w3-round-xxlarge" href="?action=editar&idmetododepago=<?php echo $r->idmetododepago; ?>">Editar</a> <a  class="w3-btn w3-round-xxlarge" href="?action=eliminar&idmetododepago=<?php echo $r->idmetododepago; ?>">Eliminar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
       
            </div>
        </div>

    </body>
</html>