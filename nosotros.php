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
<?php  include('navbar.php');?>


<h1 class="text text-center" style="font-family: COURIER bold; color: black;" >HM STUDIO</h1>

<br>

<h3 style="margin-left:30px;">¿Quiénes Somos?</h3>
<br>

<p id="p1"; >
Somos un grupo de músicos y técnicos trabajando desde hace más de 15 años en el mundo de la música. Nos dedicamos a la producción de temas, mezclas y mastering. Lo nuevo? instrumentales o beats para música urbana o cumbia.


<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal1">
  Galería
</button></p>

<!-- Modal -->
<div class="modal fade"  id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background:linear-gradient(150deg, #000000,#414141, #f10271);">

      <div class="modal-header">
        <div class="text text-white">
        <h4 class="modal-title" id="exampleModalLabel" style="font-family: COURIER bold;">Nosotros...</h4>
      </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

         <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div align="center">
    <div class="carousel-item active">

      <img src="assets/multimedia/images/galeria/nosotros1.jpg" width="360px"; height="420px";  style="margin-right: 20px;" class="d-block w-80" alt="">
    </div>
    <div class="carousel-item">
      <img src="assets/multimedia/images/galeria/nosotros2.jpg" width="360px"; height="420px";  style="margin-right: 20px;" class="d-block w-80" alt="">
    </div>
    <div class="carousel-item">
      <img src="assets/multimedia/images/galeria/nosotros3.jpg" width="360px"; height="420px";  style="margin-right: 20px;" class="d-block w-80" alt="">
    </div>
  </div>
  </div>
</div>
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
      </div>
    </div>
  </div>
</div>
<br>
<h3 class="text text-dark"; style="margin-left:30px;">Nuestros Servicios</h3>
<br>
  <ul id="ul" style="font-size:20px;" >
      <li>Grabación, Mezcla y Mastering</li>
      <li>Producción musical</li>
      <li>Beatmaker (instrumentales para música urbana)</li>
    </li><br>

  </ul>
<br>

<h3 style="margin-left:30px;">Cómo Descargar Contenido</h3><br>
<p id="p1"; >
  Primero tenés que registrarte ingresando tu mail, contraseña y un nombre de usuario. Una vez registrado podrás navegar por todo nuestro contenido y elegir  lo que quieras descargar. Por último, pagá mediante tu cuenta de Mercado Pago. Listo! Ya podés descargar el contenido.
  Tené en cuenta que sólo podrás descargar un contenido a la vez.
</p>
<br>

<br>

<h3 style="margin-left:30px;">Contactanos</h3>
<br>
<p id="p1"; >
  Si tenés alguna duda o querés conocer más acerca de lo que hacemos, hacelo a través de nuestras redes sociales, por mail, whatsapp o Instagram. Contamos con promociones para solistas o bandas. No dudes en escribirnos!
</p>

<div>


<?php
require_once("pie.php");?>
  

  <script src="js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>


</body>
</html>
