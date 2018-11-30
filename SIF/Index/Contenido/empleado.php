<?php
require_once 'empleado.Entidad.php';
require_once 'empleado.Model.php';
require_once 'tipoempleado.Model.php';
require_once 'tipoempleado.Entidad.php';

$alm = new Empleado();
$model = new EmpleadoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('idempleado',            $_REQUEST['idempleado']);
            $alm->__SET('nombre',                    $_REQUEST['nombre']);
           
            $alm->__SET('documento',                    $_REQUEST['documento']);
            $alm->__SET('direccion',                    $_REQUEST['direccion']);
            $alm->__SET('telefono',                    $_REQUEST['telefono']);
            $alm->__SET('email',                    $_REQUEST['email']);
            $alm->__SET('didtipoempleado',                    $_REQUEST['didtipoempleado']);          
            $alm->__SET('password',                    $_REQUEST['password']);
            $alm->__SET('rol',                    $_REQUEST['rol']);
			
            $model->Actualizar($alm);
            header('Location: empleado.php');
            break;

        case 'registrar':
            
            $alm->__SET('idempleado',            $_REQUEST['idempleado']);
            $alm->__SET('nombre',                    $_REQUEST['nombre']);
    
            $alm->__SET('documento',                    $_REQUEST['documento']);
            $alm->__SET('direccion',                    $_REQUEST['direccion']);
            $alm->__SET('telefono',                    $_REQUEST['telefono']);
            $alm->__SET('didtipoempleado',                    $_REQUEST['didtipoempleado']);  
            $alm->__SET('email',                    $_REQUEST['email']);
            $alm->__SET('password',                    $_REQUEST['password']);
            $alm->__SET('rol',                    $_REQUEST['rol']);
             
            $model->Registrar($alm);
            header('Location: empleado.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idempleado']);
            header('Location: empleado.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idempleado']);
            break;
    }
}
include('seguridad_a.php');

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
<title>Empleados</title>
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
                                    <a href="empleado.php" class="logo"><strong>Modo Administrador</a></strong>
                                    
                                    
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
    <center><font class="w3-opacity" size="15%" style="color:red;"> <span class="detallefactura">Registro Empleados</span></font> 
    </center></legend><br>
    </head>
    <body style="padding:50px;">
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                
                <form action="?action=<?php echo $alm->idempleado > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idempleado" value="<?php echo $alm->__GET('idempleado'); ?>" />
                    
                   <table width="87%" border="0" align="center" class="w3-table w3-RED">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" autocomplete="off" name="nombre" placeholder="Nombre del empleado" required value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                         <tr>
                            <th style="text-align:left;">Documento</th>
                            <td><input type="text" autocomplete="off" name="documento" placeholder="Digite su documento" required value="<?php echo $alm->__GET('documento'); ?>" style="width:100%;" /></td>
                        </tr>
                          <tr>
                            <th style="text-align:left;">Direccion</th>
                            <td><input type="text" autocomplete="off" name="direccion" placeholder="Direccion" required value="<?php echo $alm->__GET('direccion'); ?>" style="width:100%;" /></td>
                        </tr>
                        
                      
                       
                        <tr>
                            <th style="text-align:left;">Telefono</th>
                            <td><input type="text" autocomplete="off" name="telefono" placeholder="Ingrese su telefono/Celular" required value="<?php echo $alm->__GET('telefono'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Correo</th>
                            <td><input type="text" autocomplete="off" name="email" placeholder="Ingrese su correo" required value="<?php echo $alm->__GET('email'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Contraseña</th>
                            <td><input type="password" autocomplete="off" name="password" placeholder="Ingrese su Contraseña" required value="<?php echo $alm->__GET('password'); ?>" style="width:100%;" /></td>
                        </tr>    
                        
                        <tr>
                            <th style="text-align:left;">Tipo de Empleado</th>
                            <td>
                                <select name="rol" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new TipoempleadoModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('didtipoempleado') ?>"
                                    <?php echo $ta->__GET('didtipoempleado') == $alm->__GET('idtipoempleado') ? 'selected' : ''?>
                                    <?php echo $ta->__GET('idtipoempleado') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>
                             </td>  
                                        

                        <tr>
                            
                        </tr>
                    </table>
                     <td width="123"><button type="password" class="w3-btn w3-red w3-round-xxlarge">Guardar</button> 

                        <button align="center" type="submit" onclick="location.href='principalA.html'" class="w3-btn w3-red w3-round-xxlarge">volver</button></td>
                </form><br><br>

                <table width="113%" class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                        
                            <th width="10%" style="text-align:left;">Nombre</th>

                            <th width="14%" style="text-align:left;">Documento</th>
                            <th width="12%" style="text-align:left;">Direccion</th>
                            <th width="11%" style="text-align:left;">Telefono</th>
                            <th width="11%" style="text-align:left;">Password</th>
                            <th width="9%" style="text-align:left;">Correo</th>
                               <th width="11%" style="text-align:left;">Tipo empleado</th>
                            <th width="8%" style="text-align:left;">rol</th>

                    
                            <th width="5%"></th>
                            <th width="20%"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                          
                            
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('documento'); ?></td>
                            <td><?php echo $r->__GET('direccion'); ?></td>
                            <td><?php echo $r->__GET('telefono'); ?></td>
                            <td><?php echo $r->__GET('email'); ?></td>
                            <td><?php echo $r->__GET('password'); ?></td>
                            <td><?php echo $r->__GET('didtipoempleado'); ?></td>
                            <td><?php echo $r->__GET('rol'); ?></td>
                        
                              
                            <td>&nbsp;</td>
                            
                            <td>
                                <a  class="w3-btn w3-gray w3-round-xxlarge" href="?action=editar&idempleado=<?php echo $r->idempleado; ?>">Editar</a> 
                                <a  class="w3-btn w3-red w3-round-xxlarge" href="?action=eliminar&idempleado=<?php echo $r->idempleado; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>