<?php
class Login
{
  public function evaluar($documento, $contrasena)
  {
	  session_start();
	  
	  $cont=0;
	  $username= $_POST['documento'];	
	  $password= $_POST['password'];	
	  //Consulta de la DB--
	  
	  include('conexion.php');
	  $sql = "SELECT * FROM empleado WHERE documento = '$username' AND password = '$password'";
	  if(!$result = $db->query($sql)){
		  die('Datos no encontrados!!! [' . $db->error . ']');
	  }
	  while($row = $result->fetch_assoc())
	  {
		  $ddocumento=stripslashes($row["documento"]);
		  $ccontrasena=stripslashes($row["password"]);
		  $ffk_id_rol=stripslashes($row["rol"]);
	  if (($ddocumento==$username) && ($password == $ccontrasena))
	  {
		$cont=$cont=1;
		
		  
	  }
		  
	  } //Fin del WHILE
	  
	  //Consulta de la DB
	  
	  if($cont!="0" && $ffk_id_rol=="1")
	  {
		  $_SESSION["estado"]="1";
		  $_SESSION["nombre"]=$documento;
		  if($ffk_id_rol=="1")
		  {
			$_SESSION["rol"]="1";
		  }
		  
		 header ("Location:Contenido/principalE.html");
	  }
		  if($cont!="0" && $ffk_id_rol=="2")
		  {
			  $_SESSION["estado"]="1";
			  $_SESSION["nombre"]=$documento;
			  if($ffk_id_rol=="2")
			  {
				$_SESSION["rol"]="2";
			  }
			  
			 header ("Location:Contenido/principalA.html");
	  }

	  if($cont=="0")
	  {
		 header ("Location:ingreso_f.html");
	  }
  }
	
}
$nuevo=new Login();
$nuevo->evaluar($_POST["documento"], $_POST["password"], $_POST["rol"])


?>