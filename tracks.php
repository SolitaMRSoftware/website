<?php 
require_once('configuracion.php');
require_once('conexion.php');


if (isset($_GET['cerrarSesion'])) {
  session_destroy();
  header('location:index.php');
}
$conexion=conectar();
$sql="SELECT * FROM usuarios WHERE emailUsuario='".$_SESSION['email']."' ";
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
<?php  include('navbar.php');?>

   <div class="col-12 mt-1 text-dark" >
    <div class="text text-center" style="font-family: COURIER bold; ">
      <strong><h1>Pistas</h1></strong>
      <div align="icon-align-justify">
      <a class="nav-link" href="seleccionar.php"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg></a>
      </div>


<div class="container-fluid row">
  <div align="center">
      <div class="mt-2">
      <div class="col-12 tablaPistas" id="div1">
          <table class="table table-dark table-striped" >
            <thead>
              <tr style="font-family:COURIER bold">
                <th scope="col" style="font-size:20px;">Categoría</th>
                <th scope="col" style="font-size:20px;">Código</th>
                <th scope="col" style="font-size:20px;">Precio</th>
                <th scope="col" style="font-size:20px;">Pista</th>
                <th scope="col" style="font-size:20px;">Reproducir</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $conexion=conectar();
              $buscar = mysqli_query($conexion,"SELECT * from tracks");
              $lista = array();
              $i=0;
                while($datos = mysqli_fetch_array($buscar)){
                  array_push($lista,$datos['pista']);
                    echo '
                    <tr>
                      <th scope="row">'.$datos['categoria'].'</th>
                      <th>'.$datos['codigo'].'</th>
                      <th>'.$datos['precio'].'</th>
                      <th>'.$datos['nombrepista'].'</th>
                      <th><button class="reproductor'.$i.'" onclick=reproducirMusica("generando'.$i.'","'.$lista[$i].'") data-bs-toggle="modal" data-bs-target="#exampleModal2">Play</button><button onclick=reproducirMusica()>Stop</button><br><br></th>
                    </tr>
                    
                    ';
                  $i++;
                }
                
                mysqli_close($conexion);
            ?>

            <audio id="cancion" src=""></audio>

            <script> 
              let audioEtiqueta=document.querySelector("#cancion")
              function reproducirMusica(nombreClase,nombrePista){
                let nombreBoton = "."+nombreClase
                audioEtiqueta.src = ""
                audioEtiqueta.src = nombrePista
                audioEtiqueta.play()  
                                         
              }
              function stopMusica(){
                  audioEtiqueta.src= ""
              }

            </script>
              </tbody>
              </table>

  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content" style="background-color:black;">
      <div class="modal-header">
        <div class="text text-white">
        <h5 class="modal-title" id="exampleModalLabel" >Reproduciendo...</h5>
        <button type="button" class="btn-close btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      </div>
      <div class="modal-body" align="center">
        <video autoplay loop width="450"; height="550"; style="margin-right: 10px;" > 
          <source src="assets/multimedia/images/pistas/Dancing.mp4" type="video/mp4">
          <source src="assets/multimedia/images/pistas/Dancing.webm" type="video/webm">
          <source src="assets/multimedia/images/pistas/Dancing.ogv" type="video/ogv">
          
        </video>
      </div>
    </div>
    </div>
  </div>

 
  <script src="js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>


</body>
</html>
