<?php
require_once 'categoria.Entidad.php';
require_once 'categoria.Model.php';


$alm = new Categoria();
$model = new CategoriaModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idcategoria',            $_REQUEST['idcategoria']);
			$alm->__SET('nombre',         $_REQUEST['nombre']);
			
			$model->Actualizar($alm);
			header('Location: categoria.php');
			break;

		case 'registrar':
			$alm->__SET('idcategoria',            $_REQUEST['idcategoria']);
            $alm->__SET('nombre',         $_REQUEST['nombre']);
            
            $model->Registrar($alm);
            header('Location: categoria.php');
            break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['idcategoria']);
			header('Location: categoria.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idcategoria']);
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
.categoria {
	font-weight: bold;
}
</style>
<head>
<title>Categoria</title>
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
									<a href="categoria_e.php" class="logo"><strong>Modo empleado</a></strong>
                                    
                                    
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
	<center>
	<font class="w3-opacity" size="15%" style="color:red;"> <span class="categoria">Categoria</span></font>
	</center></legend><br>
	</head>
    <body style="padding:50px;">

    <div class="pure-g">
      <div class="pure-u-1-12">
                
        <form action="?action=<?php echo $alm->idcategoria > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="Formulario" style="margin-bottom:30 px;">
                <div align="center">
                  <p>
                    <input type="hidden" name="idcategoria" value="<?php echo $alm->__GET('idcategoria'); ?>" />
                  </p>
                  <table width="87%" border="0">
                    <tr>
                      <th width="219" height="119" scope="row"><div align="center"><h2>Categoria</h2></div></th>
                      <td width="369"><div align="center">
                        <input type="text" autocomplete="off" name="nombre" placeholder="Nombre de la Categoria" required value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" />
                      </div>
                      
                  </table>
                   <td width="123"><button type="submit" class="w3-btn w3-round-xxlarge">Guardar</button> <button align="center" type="submit" onclick="location.href='principalE.html'"class="w3-btn w3-round-xxlarge">volver</button></td>
                  <p>&nbsp;</p>
          </div>
        </form>

        <table width="87%" border="0" align="center" class="w3-table w3-RED">

                    <thead>      
                    <tr>
                      <th width="150"  style="text-align: center"><div align="center">Nombre</div></th>
                      <th width="498" style="text-align: center"></th>
                            <th width="102" style="text-align: center"></th>
                            </tr>
                    
                        
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            
                            <td><div align="center"><?php echo $r->__GET('nombre'); ?></div></td>
                            <td>&nbsp;</td>
                            <td>

                            <a  class="w3-btn w3-red w3-round-xxlarge"  href="?action=editar&idcategoria=<?php echo $r->idcategoria; ?>">Editar  </a> </button>
                       
                            </thead></td>
                        </tr>
                    <?php endforeach; ?>

              </table>   
                
              
      </div>
    </div>
    
       
</body>
</html>