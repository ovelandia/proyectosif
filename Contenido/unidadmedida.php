<?php
require_once 'unidadmedida.Entidad.php';
require_once 'unidadmedida.Model.php';


$alm = new unidad_medida();
$model = new unidadmedidaModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idunidad_medida',            $_REQUEST['idunidad_medida']);
			$alm->__SET('medida',         $_REQUEST['medida']);
			
			$model->Actualizar($alm);
			header('Location: unidadmedida.php');
			break;

		case 'registrar':
			$alm->__SET('idunidad_medida',            $_REQUEST['idunidad_medida']);
            $alm->__SET('medida',         $_REQUEST['medida']);
            
            $model->Registrar($alm);
            header('Location: unidadmedida.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idunidad_medida']);
			header('Location: unidadmedida.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idunidad_medida']);
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
<title>Unidad de medida</title>
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
                                    <a href="unidadmedida.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
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
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Unidad de medida</span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                <form action="?action=<?php echo $alm->idunidad_medida > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="formulario" style="margin-bottom:30px;">
                    <input type="hidden" name="idunidad_medida" value="<?php echo $alm->__GET('idunidad_medida'); ?>" />
                    
                  <table width="87%" border="0">
                      
                        <tr>
                            <th width="32%" style="text-align:left;">Escriba la Unidad de Medida</th>
                            <td width="68%"><input type="text" name="medida" placeholder="Unidad de medida" required value="<?php echo $alm->__GET('medida'); ?>" style="width:100%;" /></td>
                        </tr>
                        
                          
                            </td>
                        </tr>
                    </table>
                    <td width="123"><button type="submit" class="w3-btn w3-round-xxlarge">Guardar</button> <button align="center" type="submit" onclick="location.href='principal.html'" class="w3-btn w3-round-xxlarge">volver</button></td><hr><br>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <thead>
                        <tr>
                            <th width="84%" style="text-align:left;">Unidad</th>
                          <th width="16%"></th>
                          </tr>
                    </thead>
                        
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            
                            <td><?php echo $r->__GET('medida'); ?></td>
                            <td>

                                <a  class="w3-btn w3-round-xxlarge" href="?action=editar&idunidad_medida=<?php echo $r->idunidad_medida; ?>">Editar</a>
                           
                                <a  class="w3-btn w3-round-xxlarge" href="?action=eliminar&idunidad_medida=<?php echo $r->idunidad_medida; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
  
    </body>
</html>