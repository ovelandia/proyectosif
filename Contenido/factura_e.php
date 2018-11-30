<?php
require_once 'factura.Entidad.php';
require_once 'factura.Model.php';
require_once 'producto.Entidad.php';
require_once 'producto.Model.php';

$alm = new Factura();
$model = new FacturaModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idfactura',            $_REQUEST['idfactura']);
            $alm->__SET('producto',         $_REQUEST['producto']);
            $alm->__SET('cliente',         $_REQUEST['cliente']);
             $alm->__SET('cantidad',         $_REQUEST['cantidad']);           
            

			
			$model->Actualizar($alm);
			header('Location: factura.php');
			break;

		case 'registrar':
			$alm->__SET('idfactura',            $_REQUEST['idfactura']);
            $alm->__SET('producto',         $_REQUEST['producto']);
            $alm->__SET('cliente',         $_REQUEST['cliente']);
             $alm->__SET('cantidad',         $_REQUEST['cantidad']);

            $model->Registrar($alm);
            header('Location: factura.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idfactura']);
			header('Location: factura.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idfactura']);
			
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
                <form action="?action=<?php echo $alm->idfactura > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="idfactura" value="<?php echo $alm->__GET('idfactura'); ?>" />
                    <strong><font class="w3-opacity" size="15%" style="color:red;"><span class="detallefactura">Registrar factura</span></font></strong><br><br>
                    
                   <table width="87%" border="0" align="center" class="w3-table w3-">
                     <tr>
                            <th style="text-align:left;">Cantidad</th>
                            <td><input type="text" name="cantidad" placeholder="cantidad de productos" required value="<?php echo $alm->__GET('cantidad'); ?>" style="width:100%;" /></td>
                        </tr>
                         <tr>
                            <th style="text-align:left;">cliente</th>
                            <td><input type="TEXT" autocomplete="off" name="cliente" placeholder="nombre del cliente " required value="<?php echo $alm->__GET('cliente'); ?>" style="width:100%;" /></td>
                        </tr>
                      <tr>
                            <th style="text-align:left;">Producto</th>
                            <td>
                                <select name="producto" style="width:100%;">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        $tapr = new ProductoModel();
                                        foreach($tapr->Listar() as $ta):
                                    ?>
                                    <option value="<?php echo $ta->__GET('idproducto') ?>"
                                    <?php echo $ta->__GET('idproducto') == $alm->__GET('idproducto') ? 'selected' : ''?>>
                                    <?php echo $ta->__GET('desc_prod') ?></option>
                                    <?php endforeach; ?>    
                                </select>
                             </td>
                        </tr>
                            
                           
                    </table> 
                   <td width="123"><button type="submit" class="w3-btn w3-red w3-round-xxlarge">Guardar</button><br><br>

                 <strong><font class="w3-opacity" size="15%" style="color:red;"><span class="detallefactura">Listado de facturas</span></font></strong><br><br>
                <table width="97%" class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th width="13%" style="text-align:left;">Numero factura</th>
                            <th width="13%" style="text-align:left;">cantidad</th>

                            <th width="17%" style="text-align:left;">Cliente </th>
                            <th width="17%" style="text-align:left;">Productos </th>

                            

                            <th width="15%"></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('idfactura'); ?></td>
                            <td><?php echo $r->__GET('cantidad'); ?></td>
                            <td><?php echo $r->__GET('cliente'); ?></td>
                            <td><?php echo $r->__GET('producto'); ?></td>
                            
                              
                            <td><a  class="w3-btn w3-blue w3-round-xxlarge" href="?action=editar&idfactura=<?php  echo $r->idfactura; ?>">Editar</a>
                           
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
                                            <span class="opener">Productos</span>
                                                <ul>
                                            <li><a href="producto_e.php">Registrar</a></li>
                                            
                                        </li>

                                        </ul>
                                        <li>
                                            <span class="opener">Factura</span>
                                                <ul>
                                            <li><a href="factura_e.php">Registrar</a></li>
                                            
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