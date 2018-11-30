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
              <div align="center"><table width="87%" border="0">
                 <form action="?action=<?php echo $alm->idproducto > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <p>
                      <input type="hidden" name="idproducto" value="<?php echo $alm->__GET('idproducto'); ?>" />
                    </p>
                 
                    <strong><font class="w3-opacity" size="15%" style="color:red;"><span class="detallefactura">Registrar productos</span></font></strong><br><br>
                <table width="50%" border="0">
                  <th style="text-align:left;">Nombre</th>
                  <td><input type="text" autocomplete="off" name="desc_prod" placeholder="nombre" required value="<?php echo $alm->__GET('desc_prod'); ?>" style="width:100%;" /></td>
                        
                        <tr>
                            <th style="text-align:left;">Precio unitario</th>
                            <td><input type="text" autocomplete="off" name="precio" placeholder="precio " required value="<?php echo $alm->__GET('precio'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr><br>
                </table>
                  <td width="123"><button type="submit" class="w3-btn w3-red w3-round-xxlarge">Agregar</button><br><br>
                    
                </form>
               
            <strong><font class="w3-opacity" size="15%" style="color:red;"><span class="detallefactura">Lista productos</span></font></strong><br><br>

                <table width="20%" class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th width="342" style="text-align:left;">Nombre</th>
                            <th width="237" style="text-align:left;">Precio unitario</th>
                       
                            <th width="299"></th>
                            <th width="52"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('desc_prod'); ?></td>
                            <td><?php echo $r->__GET('precio'); ?></td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                            <td width="265"><a class="w3-btn w3-blue w3-round-xxlarge"href="?action=editar&idproducto=<?php echo $r->idproducto; ?>">Editar </a><a class="w3-btn w3-red w3-round-xxlarge"href="?action=eliminar&idproducto=<?php echo $r->idproducto; ?>">Eliminar</a></td>


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
                                            <a  class="image"><img src="images/pic11.jpg" alt="" /></a>
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