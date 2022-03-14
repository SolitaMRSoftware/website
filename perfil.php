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


 <div class="container-fluid col-8 mt-3 mb-5">
    <div class="row">
 	<div class="card" style="background:   #bc4e9c;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #f80759, #bc4e9c);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #f80759, #bc4e9c); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


" style="font-family:COURIER bold">


        <div align="center">
             <form method="POST">
                    
            <div class="card-header">

                <img src="assets/multimedia/avatar/<?php echo $datos['imagenUsuario'];?>;" style="width: 12vw;" alt=""/>
                <br>
                 <h3 style="color:black; font-family:Courier bold;"><?php echo $datos['nombreUsuario']; ?></h3> 
                <h3 style="color:black; font-family:Courier bold;"><?php echo $datos['emailUsuario']; ?></h3>

                 <p>(Sólo podés modificar tu nombre de usuario)</p>
              
            </div> 
        </div>
       
        <div align="center">
        <div class="mb-3 mt-2">  
            <div class="col-4">
            <div class="input-group mb-3">
                <span class="input-group-text" id="idusuario">ID: </span>
                 <input name="nombreUsuario" type="text" placeholder="Username" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo $datos['idUsuario']; ?>"disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="Username">user: </span>
                 <input name="nombreUsuario" type="text" placeholder="Username" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="emailUsuario">mail: </span>
                <input name="emailUsuario" type="text" placeholder="usuario@gmail.com" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo $datos['emailUsuario']; ?>">
            </div>
        </div>
            <?php 
                    if (isset($_POST['modificarUsuario'])) {
                        $conexion=conectar();
                        $nombreUsuario=$_POST['nombreUsuario'];
                        $email=$_POST['emailUsuario'];

                    $sql="UPDATE usuarios SET nombreUsuario='".$nombreUsuario."' WHERE emailUsuario='".$email."' ";
                 echo '
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </symbol>
                    </svg>
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                      <div>
                        Modificaste tu perfil correctamente! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    </div>
                                      
                    ';

                    $modificar=mysqli_query($conexion,$sql);
                }
                 ?>

                 <?php 
                 //VOY A ELIMINAR
                    if (isset($_POST['eliminarUsuario'])) {
                        $conexion=conectar();
                        $nombreUsuario=$_POST['nombreUsuario'];
                        $email=$_POST['emailUsuario'];

                    $sql="DELETE FROM usuarios WHERE emailUsuario='".$email."'";
                    echo '
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
                  <div class="alert alert-danger d-flex align-items-center" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="20" height="20" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                      <div>
                        Has eliminado tu perfil... Adiós!
                      </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';

                    $eliminar=mysqli_query($conexion,$sql);
                }
                 ?>

               
             <div class="row">
               <div class="col-sm-12 text-center">

                <button name="modificarUsuario" class="btn btn-dark text-white btn-md center-block" Style="width: 100px;">Modificar</button>
                    
                <button name="eliminarUsuario" class="btn btn-dark text-white btn-md center-block" Style="width: 100px;">Eliminar</button>
                
                    </div>
              </div>
			</form>
         </div>

            <br>               
            <h3 style="color:black; font-family:Courier bold;">Mis Compras</h3>
            <div class="col-10 tablaPistas" id="div3">
                <div class="tablaPistas">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th><br></th>
                            
                            <th scope="col"><br></th>
                            <th scope="col"></th>
                            <th><br></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                       
                        $conexion=conectar();
                        $listarCompra=mysqli_query($conexion, "SELECT * FROM compra WHERE emailUsuario='".$_SESSION['email']."' ");
                        while($datos=mysqli_fetch_array($listarCompra)){
                            echo '
                                <tr>
                                    <th><br></th>
                                    <th>'.$datos['pistaComprada'].'</th>
                                    <th><audio controls="" src="assets/music/'.$datos['pistaComprada'].'"></audio></th>
                                    
                                    <th><br></th>
                                    
                            ';
                            
                        }
                        mysqli_close($conexion);
                        ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        <br>
		</div>
		 </div>
</div>
	</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>

</body>
</html>