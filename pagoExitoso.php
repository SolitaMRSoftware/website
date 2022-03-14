<?php 
require_once('configuracion.php');
require_once('conexion.php');
require_once('consultasCompras.php');

if (isset($_GET['cerrarSesion'])) {
	session_destroy();
	header('location:index.php');

}
$conexion=conectar();
$sql="SELECT * FROM compra WHERE emailUsuario='".$_SESSION['email']."' ";
$perfil=mysqli_query($conexion,$sql);
$datos=mysqli_fetch_array($perfil);
?>

<!DOCTYPE html>
<html>
<head lang="es">
  <meta charset="utf-8">
  <title>HM STUDIO</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/estilos.css?ver=2.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
  
<hr>
	<h2 align="center" class="text text-center" style="font-family: COURIER bold">GRACIAS POR TU COMPRA!</h2>
	<h4 align="center" class="text text-center" style="font-family: COURIER bold">Ya podés descargar tu pista en tu perfil</h4>
	<div align="center">
         <div class="card-header">
        	<img src="assets/multimedia/images/perfil1.png" style="width: 40vw;height: 68vh;">
       
            <a class="nav-link" href="perfil.php" style="color:#05DFD7">Ir a Perfil</a>
        </div>
    </div>
 		
</body>
</html>