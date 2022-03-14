<?php 
require_once("configuracion.php");
require_once("conexion.php");
require_once("consultasCompras.php");
$codigo=$_GET['codigo'];
$emailUsuario=$_SESSION['email'];
$conexion=conectar();
$sql=mysqli_query($conexion,"SELECT * FROM tracks WHERE codigo='".$codigo."'");
$datosCompra=mysqli_fetch_array($sql);
$precio=$datosCompra['precio'];
$nombrepista=$datosCompra['nombrepista'];
guardarCompra($codigo,$precio,$nombrepista,$emailUsuario);
header('location:pagoExitoso.php');

 ?>
 