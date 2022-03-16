<?php 
require_once('configuracion.php');
require_once('conexion.php');


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

<body>

<?php  include('navbar.php');?>

<div class="col-12 mt-4 text-dark" >
    <h2 align="center" class="text text-center" style="font-family: COURIER bold" >Elije Tu Pista</h2>
    <div class="container-fluid">
        <div class="row">
        <div align="center">
        <div class="col-4">
            <div class="card">
                <div class="card-header" style="background:background: #8e9eab;  /* fallback for old browsers */background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */background: linear-gradient(to right, #eef2f3, #8e9eab); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */;color: darkgray;" >

                <tr style="font-family:COURIER">
                <form action="" method="POST">
                    <div class="col-12" mt-4>
                    <input type="text" id="codigo" name="codigo" placeholder="Ingresar Código">
                    <input type="submit" name="search" id="search" value="search" class="btn btn-outline-secondary">
                </div>
                </form>
            </tr>
        
            <div class="col-10 tablaPistas">
                <div class="tablaPistas">
                <table class="table table-white table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Pista</th>
                         </tr>
                    </thead>
                    <tbody>
        

<?php 
//si se pulsa el boton de busqueda
if (isset($_POST['codigo'])) {
    // conecto con la base y busco
    $conexion=conectar();
    //recojo la clave enviada
    $sql="SELECT * FROM tracks WHERE codigo='$_POST[codigo]'";
    $buscarPista=mysqli_query($conexion,$sql);
        while ($datos= mysqli_fetch_array($buscarPista)) {
            echo '
                <tr>
                <th>'.$datos['codigo'].'</th>
                <th>'.$datos['precio'].'</th>
                <th>'.$datos['nombrepista'].'</th>
                </tr>
                ';
        if (isset($_SESSION['email'])) {
            $datosCompra=array($datos['codigo'],$datos['precio'],$datos['nombrepista'],$_SESSION['email']);
        }else{
            $datosCompra=array($datos['codigo'],$datos['precio'],$datos['nombrepista'],"");
        }
   mysqli_close($conexion);

 //SDK de Mercado Pago
require __DIR__. '/vendor/autoload.php';
 // Agrega credenciales
MercadoPago\SDK::setAccessToken('');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
$preference->back_urls=array("success"=> "localhost/pagina/generando/procesarPago.php?codigo=".$datosCompra[0],
      "failure"=> "localhost/pagina/generando/errorPago.php",
      "pending"=> "localhost/pagina/generando/pagoPendiente.php"
 );
$preference->auto_return="approved";
//item de preferencia
$item = new MercadoPago\Item();
$item->title=$datosCompra[2];
$item->quantity=1;
$item->unit_price=$datosCompra[1];
$preference->items = array($item);
$preference->save();
             
    }
}
 ?> 

                </tbody>
            </table>
            <div align="center">
                <div class="col-12"><br>
                <form action="procesarPago.php" method="POST">
                  <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                      data-preference-id="<?php echo $preference->id; ?>">
                   </script>
               </form>
                </div>
            </div>
</div>
</div>
</div>
</div>
</div>
</div>

     <div align="center">
        <div class="col-12">

        <a class="nav-link" href="tracks.php">Volver</a>
    </div>
</div>
</div>
</div>


  <script src="js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>

</body>
</html>
