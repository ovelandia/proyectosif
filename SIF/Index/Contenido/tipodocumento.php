<?php
require_once 'tipodocumento.entidad.php';
require_once 'tipodocumento.model.php';

// Logica de negocio
$alm = new TipoDocumento();
$model = new TipodocumentoModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idtd',            $_REQUEST['idtd']);
			$alm->__SET('descripcion',     $_REQUEST['descripcion']);
			
			$model->Actualizar($alm);
			header('Location: tipodocumento.php');
			break;

		case 'registrar':
			$alm->__SET('idtd',            $_REQUEST['idtd']);
            $alm->__SET('descripcion',     $_REQUEST['descripcion']);
            
            $model->Registrar($alm);
            header('Location: tipodocumento.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idtd']);
			header('Location: tipodocumento.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idtd']);
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
<title>Tipo Documento</title>
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
                                    <a href="tipodocumento.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
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
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Tipo Documento	</span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                
                <form action="?action=<?php echo $alm->idtd > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idtd" value="<?php echo $alm->__GET('idtd'); ?>" />
                    
                    <table width="87%" border="0">
                      
                        <tr>
                            <th style="text-align:left;">Documento</th>
                            <td><input type="text" name="descripcion" placeholder="Documento Cliente" required value="<?php echo $alm->__GET('descripcion'); ?>" style="width:100%;" /></td>
                        </tr>
                        
                    </table>
                     <td width="123"><button type="submit" class="w3-btn w3-round-xxlarge">Guardar</button> <button align="center" type="submit" onclick="location.href='principal.html'"class="w3-btn w3-round-xxlarge">volver</button></td><hr><br>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            
                            <th width="66%" style="text-align:left;">Documento</th>
                            <th width="17%"></th>


                            <th width="14%"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            
                            <td><?php echo $r->__GET('descripcion'); ?></td>
                            <td>&nbsp;</td>
                            <td>
                                <a href="?action=editar&idtd=<?php echo $r->idtd; ?>"></a>
                        
                                <a  class="w3-btn w3-round-xxlarge" href="?action=editar&idtd=<?php echo $r->idtd; ?>">Editar</a> 
                                <a class="w3-btn w3-round-xxlarge" href="?action=eliminar&idtd=<?php echo $r->idtd; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              </fieldset>
            </div>
        </div>

    </body>
</html>