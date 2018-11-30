<?php
require_once 'Instructor.Entidad.php';
require_once 'Instructor.Model.php';
require_once 'tipodocumento.entidad.php';
require_once 'tipodocumento.model.php';
require_once 'Genero.Entidad.php';
require_once 'Genero.Model.php';



// Logica de negocio
$alm = new Instructor();
$model = new InstructorModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('Id',              $_REQUEST['Id']);
			$alm->__SET('nombre',          $_REQUEST['nombre']);
			$alm->__SET('apellido',        $_REQUEST['apellido']);
			$alm->__SET('genero',          $_REQUEST['genero']);
            $alm->__SET('ciudad',          $_REQUEST['ciudad']);
            $alm->__SET('telefono',        $_REQUEST['telefono']);

			$model->Actualizar($alm);
			header('Location: index.php');
			break;

		case 'registrar':
			$alm->__SET('nombre',          $_REQUEST['nombre']);
            $alm->__SET('apellido',        $_REQUEST['apellido']);
            $alm->__SET('genero',          $_REQUEST['genero']);
            $alm->__SET('ciudad',          $_REQUEST['ciudad']);
            $alm->__SET('telefono',        $_REQUEST['telefono']);
            

			$model->Registrar($alm);
			header('Location: index.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['Id']);
			header('Location: index.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['Id']);
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
<title>Clientes</title>
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
                                    <a href="index.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
                                    <ul class="icons">
                                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
   
                                        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                                        <button align="center"  onclick="location.href='../ingreso.html'" class="w3-btn w3-red w3-round-xxlarge">Cerrar Sesion</button>
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
    <center>
    <font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura"> Registrar Clientes</span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                
                <form action="?action=<?php echo $alm->Id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="Id" value="<?php echo $alm->__GET('Id'); ?>" />
                    
                  <table width="87%" border="0" align="center" class="w3-table w3-RED">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" autocomplete="off" name="nombre" placeholder="Nombre cliente" required value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Apellidos</th>
                            <td><input type="text" autocomplete="off" name="apellido" placeholder="Apellidos cliente" required value="<?php echo $alm->__GET('apellido'); ?>" style="width:100%;" /></td>
                       </tr>

                        <tr>
                            
                        </tr>
                        
                        
                        <tr>
                            <th style="text-align:left;">Genero</th>
                            <td>
                                <select name="genero" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tgen = new GeneroModel();
                                        foreach($tgen->Listar() as $tg):
                                    ?>
                                    <option value="<?php echo $tg->__GET('Idgen') ?>"
                                    <?php echo $tg->__GET('Idgen') == $alm->__GET('Idgen') ? 'selected' : ''?>>
                                    <?php echo $tg->__GET('descgenn') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>

                       
                        <tr>
                            <th style="text-align:left;">Ciudad</th>
                            <td><input type="text" autocomplete="off" placeholder="Ciudad cliente" required name="ciudad" value="<?php echo $alm->__GET('ciudad'); ?>" style="width:100%;" /></td>
                        </tr>
                      
                        <tr>
                            <th style="text-align:left;">Telefono</th>
                            <td><input type="text" autocomplete="off" name="telefono" placeholder="Telefono cliente" required value="<?php echo $alm->__GET('telefono'); ?>" style="width:100%;" /></td>
                        </tr>

                        <tr>
                            <td colspan="2">
                               
                            </td>
                        </tr>
                    </table>
                    <td width="123"><button type="submit" class="w3-btn w3-red w3-round-xxlarge">Agregar</button> <button align="center" type="submit" onclick="location.href='principalA.html'" class="w3-btn w3-red w3-round-xxlarge">volver</button></td>
                </form><br>
                <center>
    <font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura"> Lista Clientes</span></font> 
                </center><br>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th width="16%" style="text-align:left;">Nombre</th>
                            <th width="16%" style="text-align:left;">Apellidos</th>
                            <th width="16%" style="text-align:left;">Genero</th>
                            
                            <th width="14%" style="text-align:left;">Ciudad</th>
                            <th width="16%" style="text-align:left;">Teléfono</th>
                            <th width="5%"></th>
                            

                            <th width="14%"></th>
                            <th width="3%"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('apellido'); ?></td>
                          
                            <td><?php echo $r->__GET('descgenn'); ?></td>
                           
                            <td><?php echo $r->__GET('ciudad'); ?></td>
                            <td><?php echo $r->__GET('telefono'); ?></td>
                            <td>&nbsp;</td>
                            
                            <td>
                                <a class="w3-btn w3-blue w3-round-xxlarge" href="?action=editar&Id=<?php echo $r->Id; ?>">Editar</a>
                            
                                <a class="w3-btn w3-red w3-round-xxlarge" href="?action=eliminar&Id=<?php echo $r->Id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>