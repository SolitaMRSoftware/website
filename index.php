<?php
if (isset($_GET['cerrarSesion'])) {
  session_destroy();
  header('location:index.php');
}

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
<body >
<?php  include('navbar.php');?>

<!--contenido-->

<div class="main-content">
  <div id="table">
    <h1></h1>
    <div align="center">
    <div class="card" style="width: 35rem;background:linear-gradient(150deg, #eba102, #f10271, #00c298);">
     <p class="card-text" style="font-family: candara; font-size: 35px;color: #000000;">Hola!! registrate para navegar...</p>

<script>
    
 function typeEffect(element, speed) {
    var text = element.innerHTML;
    element.innerHTML = "";
    
    var i = 0;
    var timer = setInterval(function() {
    if (i < text.length) {
      element.append(text.charAt(i));
      i++;
    } else {
      clearInterval(timer);
    }
  }, speed);
}


// application
var speed = 75;
var h1 = document.querySelector('h1');
var p = document.querySelector('p');

var delay = h1.innerHTML.length * speed + speed;

// type affect to header
typeEffect(h1, speed);


// type affect to body
setTimeout(function(){
  p.style.display = "inline-block";
  typeEffect(p, speed);
}, delay);


</script>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>


</body>
</html>
