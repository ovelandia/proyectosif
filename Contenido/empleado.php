<?php
require_once 'empleado.Entidad.php';
require_once 'empleado.Model.php';
require_once 'tipodocumento.Model.php';
require_once 'tipodocumento.Entidad.php';
require_once 'Genero.Model.php';
require_once 'Genero.Entidad.php';

$alm = new Empleado();
$model = new EmpleadoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('idempleado',            $_REQUEST['idempleado']);
            $alm->__SET('nombre_emp',                    $_REQUEST['nombre_emp']);
            $alm->__SET('apellido_emp',                    $_REQUEST['apellido_emp']);
             $alm->__SET('password',                    $_REQUEST['password']);
            $alm->__SET('documento',                    $_REQUEST['documento']);
            $alm->__SET('fk_genero',            $_REQUEST['fk_genero']);
            $alm->__SET('fk_tipodocumento',            $_REQUEST['fk_tipodocumento']);
            $alm->__SET('direccion',                    $_REQUEST['direccion']);
            $alm->__SET('telefono',                    $_REQUEST['telefono']);
            $alm->__SET('correo',                    $_REQUEST['correo']);
           $alm->__SET('rol',            $_REQUEST['rol']);
      
			
            $model->Actualizar($alm);
            header('Location: empleado.php');
            break;

        case 'registrar':
            
          $alm->__SET('idempleado',            $_REQUEST['idempleado']);
            $alm->__SET('nombre_emp',                    $_REQUEST['nombre_emp']);
            $alm->__SET('apellido_emp',                    $_REQUEST['apellido_emp']);
             $alm->__SET('password',                    $_REQUEST['password']);
            $alm->__SET('documento',                    $_REQUEST['documento']);
            $alm->__SET('fk_genero',            $_REQUEST['fk_genero']);
            $alm->__SET('fk_tipodocumento',            $_REQUEST['fk_tipodocumento']);
            $alm->__SET('direccion',                    $_REQUEST['direccion']);
            $alm->__SET('telefono',                    $_REQUEST['telefono']);
            $alm->__SET('correo',                    $_REQUEST['correo']);
           $alm->__SET('rol',            $_REQUEST['rol']);

     
             
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

?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!DOCTYPE HTML>
<html>
    <head>
        <title>EL FLORERO</title>
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
                                    <a href="principalA.html" class="logo"><strong>Inicio</strong></a>
                                    <ul class="icons">
                                        <li><a href="" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                                        
                                        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                                        
                                        <button align="center"  onclick="location.href='salir.php'" class="w3-btn w3-round-xxlarge">Cerrar Sesion</button>
                                    </ul>
                                </header>
                                

                            <!-- Content -->
                                <section>
                                    <header class="main">
                                        
                                    </header>
                                    
                                     <div class="pure-g">
            <div class="pure-u-1-12">
              <div align="center">
                <form action="?action=<?php echo $alm->idempleado > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idempleado" value="<?php echo $alm->__GET('idempleado'); ?>" />
                    <strong><font class="w3-opacity" size="15%" style="color:red;"><span class="detallefactura">Registrar empleados</span></font></strong><br><br>
                    
                   <table width="87%" border="0" align="center" >
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" autocomplete="off" name="nombre_emp" placeholder="Nombre del empleado" required value="<?php echo $alm->__GET('nombre_emp'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Apellido</th>
                            <td><input type="text" autocomplete="off" name="apellido_emp" placeholder="Apellido del empleado" required value="<?php echo $alm->__GET('apellido_emp'); ?>" style="width:100%;" /></td>
                        </tr>
                         
                         <tr>
                            <th style="text-align:left;">Contraseña</th>
                            <td><input type="password" autocomplete="off" name="password" placeholder="Ingrese su contrasena" required value="<?php echo $alm->__GET('password'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Direccion</th>
                            <td><input type="text" autocomplete="off" name="direccion" placeholder="Direccion" required value="<?php echo $alm->__GET('direccion'); ?>" style="width:100%;" /></td>
                        </tr>

                        <tr>
                            <th style="text-align:left;">Documento</th>
                            <td><input type="text" autocomplete="off" name="documento" placeholder="Digite su documento" required value="<?php echo $alm->__GET('documento'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Telefono</th>
                            <td><input type="text" autocomplete="off" name="telefono" placeholder="Ingrese su telefono/Celular" required value="<?php echo $alm->__GET('telefono'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Correo</th>
                            <td><input type="text" autocomplete="off" name="correo" placeholder="Ingrese su correo" required value="<?php echo $alm->__GET('correo'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Rol</th>
                            <td><input type="text" autocomplete="off" name="rol" placeholder="Ingrese el rol" required value="<?php echo $alm->__GET('rol'); ?>" style="width:100%;" /></td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left;">Tipo de Documento</th>
                            <td>
                                <select name="fk_tipodocumento" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new tipodocumentomodel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idtipodocumento') ?>"
                                    <?php echo $ta->__GET('idtipodocumento') == $alm->__GET('idtipodocumento') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('desc_doc') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>
                             </td>  
                             <tr>
                            <th style="text-align:left;">Genero</th>
                            <td>
                                <select name="fk_genero" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new GeneroModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idgenero') ?>"
                                    <?php echo $ta->__GET('idgenero') == $alm->__GET('idgenero') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('desc_gen') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>              

                        <tr>
                                
                        </tr>
                    </table><BR>
                    <td width="123"><button type="submit" class="w3-btn w3-red w3-round-xxlarge">Agregar</button><br><br>
                    
                </form>


                 <strong><font class="w3-opacity" size="15%" style="color:red;"><span class="detallefactura">Listado empleados</span></font></strong><br><br>
                
               
                <table class="pure-table  pure-table-horizontal">
                    <thead>
                        <tr>
                        
                            <th width="6%" height="44" style="text-align:left;">Nombre</th>
                            <th width="7%" style="text-align:left;">Apellido</th>
                            <th width="8%" style="text-align:left;">Tipo Documento</th>
                            <th width="8%" style="text-align:left;">Documento</th>
                            <th width="6%" style="text-align:left;">Genero</th>
                            <th width="7%" style="text-align:left;">Direccion</th>
                            <th width="8%" style="text-align:left;">Telefono</th>
                            <th width="6%" style="text-align:left;">Correo</th>
                            <th width="9%" style="text-align:left;">Contraseña</th>
                            <th width="9%" style="text-align:left;">Rol</th>
                           

                    
                            <th width="8%"></th>
                            <th width="18%"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                          
                            
                            <td><?php echo $r->__GET('nombre_emp'); ?></td>
                            <td><?php echo $r->__GET('apellido_emp'); ?></td>
                            <td><?php echo $r->__GET('fk_tipodocumento'); ?></td>
                            <td><?php echo $r->__GET('documento'); ?></td>
                            <td><?php echo $r->__GET('fk_genero'); ?></td>
                            <td><?php echo $r->__GET('direccion'); ?></td>
                            <td><?php echo $r->__GET('telefono'); ?></td>
                            <td><?php echo $r->__GET('correo'); ?></td>
                            <td><?php echo $r->__GET('password'); ?></td>
                            <td><?php echo $r->__GET('rol'); ?></td>

                        
                              
                            <td><a  class="w3-btn w3-blue w3-round-xxlarge"   href='empleado.php'"?action=editar&idempleado=<?php echo $r->idempleado; ?>">Editar </a></td>
                            <td><a  class="w3-btn w3-red w3-round-xxlarge" href="?action=eliminar&idempleado=<?php echo $r->idempleado; ?>">Eliminar</a></td>
                                
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </section>

                        </div>
                    </div>

                <!-- Sidebar -->
                    <div id="sidebar">
                        <div class="inner">

                            <!-- Search -->
                            <!-- Menu -->
                        <nav id="menu">
                                    <header class="major">
                                        <h2>Administrador</h2>
                                    </header>
                                    <ul>
                                        <li>
                                            <span class="opener">Registrar empleados</span>
                                                <ul>
                                            <li><a href="empleado.php">Registrar</a></li>
                                           
                                        </li>

                                        </ul>
                                        <li>
                                            <span class="opener">Productos</span>
                                                <ul>
                                            <li><a href="producto.php">Registrar productos</a></li>
                                            
                                        </ul>
                                        </li>
                                        <li>
                                            <span class="opener">Factura</span>
                                                <ul>
                                            <li><a href="factura.php">Crear Factura</a></li>
                                            
                                        </ul>
                                        </li>




                    
                                        </nav>

                            <!-- Section -->
                                <section>
                                    <header class="major">
                                    </header>
                                    <div class="mini-posts">
                                        <article>
                                            <a class="image"><img src="images/pic11.jpg" alt="" /></a>
                                            <a  class="image"><img src="images/pic12.jpg" alt="" /></a>
                                            
                                    
                                </section>
                                
                            <!-- Section -->
                                

                            <!-- Footer -->
                                <footer id="footer">
                                </footer>

                        </div>
                    </div>

            </div>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="assets/js/main.js"></script>

    </body>
</html>