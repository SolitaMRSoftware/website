<?php 
if ($_SESSION['tipo']!="admin") {
 	header('location:index.php');
 } 
require_once("configuracion.php");
include("conexion.php");

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

    
<div class="container-fluid" style="height:90.7vh;">
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left: -20px;">
        <li class="nav-item" role="presentation">
            <button class="nav-link active bg-dark text-white" id="home-tab" data-bs-toggle="tab" aria-controls="home" aria-selected="true">Pistas</button>
        </li>
    </ul>

   <div class="container-fluid tab-content mt-3" id="myTabContent">
    <div class="tab-pane fade show active" id="Pistas" role="tabpanel" aria-labelledby="home-tab" style="height:60vh;"> 
        <div class="container-fluid row mt-3 mb-3">
    
            <div class="d-flex justify-content-center">
                 <h2 class="text text-dark" style="font-family:Courier bold;">Carga de Pistas</h2>
            </div>
        </div>
        <div class="container-fluid row">
            <div class="col-6">
                <form method="POST" enctype="multipart/form-data">
                    <?php 
                    @move_uploaded_file(mp3, assets/music)
                     ?>
                    
                    <div class="row input-group input-group-sm mb-3">
                        <div class="col-3">
                            <span class="input-group-text bg-dark" style="color:deeppink;" id="inputGroup-sizing-sm">Categoría</span>
                        </div>
                        <div class="col-7">
                            <select class="fom-select" aria-label="Default select example" name="selectCategoria">
                                <option selected value="track">Tracks</option>
                                <option value="beatmaker">Beatmaker</option>
                                <option value="mezcla">Mezcla</option>
                            </select>
                        </div>
                    </div>
                    <div class="row input-group input-group-sm mb-3">
                        <div class="col-3">
                            <span class="input-group-text bg-dark" style="color:deeppink;" id="inputGroup-sizing-sm">Código</span>
                        </div>
                        <div class="col-7">
                            <input name="codigo" placeholder="Ingrese Código" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"required>
                        </div>
                    </div>
                    
                    <div class="row input-group input-group-sm mb-3">
                        <div class="col-3">
                            <span class="input-group-text bg-dark" style="color:deeppink;" id="inputGroup-sizing-sm">Precio</span>
                        </div>
                    <div class="col-7">
                            <input name="precio" type="text" placeholder="$" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"required>
                        </div>
                    </div>
                    <div class="row input-group input-group-sm mb-3">
                        <div class="col-3">
                            <span class="input-group-text bg-dark" style="color:deeppink;" id="inputGroup-sizing-sm">Pista</span>
                        </div>
                        <div class="col-7">
                            <input name="nombrepista" type="text" placeholder="loco.mp3" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"required>
                        </div>
                    </div>

                    <div class="row input-group input-group-sm mb-3">
                        <div class="col-3">
                            <span class="input-group-text bg-dark" style="color:deeppink;" id="inputGroup-sizing-sm">Ruta Pista</span>
                        </div>
                        <div class="col-7">
                            <input name="pista" type="text" placeholder="assets/music/loco.mp3" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"required>
                        </div>
                    </div>

                <?php 
                //VOY A GUARDAR
                    if (isset($_POST['guardarPista'])) {
                        $conexion=conectar();
                        $categoria=$_POST['selectCategoria'];
                        $codigo=$_POST['codigo'];
                        $precio=$_POST['precio'];
                        $nombrepista=$_POST['nombrepista'];
                        $pista=$_POST['pista'];
                        $ruta='assets/music/tracks'.$_POST['pista'] ;
                        @move_uploaded_file($pista,$ruta);

                    $sql="INSERT INTO tracks(categoria,codigo,precio,nombrepista,pista)VALUES('".$categoria."','".$codigo."','".$precio."','".$nombrepista."','".$pista."')";
                    echo '
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                      </symbol></svg>
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                          <svg class="bi flex-shrink-0 me-2" width="20" height="20" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                          <div>
                            Guardado Exitoso! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        </div>

                    ';
                    $guardar=mysqli_query($conexion,$sql);

                }
                 ?>

                <?php 
                    //VOY A MODIFICAR
                    if (isset($_POST['modificarPista'])) {
                        $conexion=conectar();
                        $categoria=$_POST['selectCategoria'];
                        $codigo=$_POST['codigo'];
                        $precio=$_POST['precio'];
                        $nombrepista=$_POST['nombrepista'];
                        $pista=$_POST['pista'];
                        $ruta='assets/music/tracks'.$_POST['pista'] ;
                        @move_uploaded_file($pista,$ruta);

                    $sql="UPDATE tracks SET categoria='".$categoria."', precio='".$precio."', nombrepista='".$nombrepista."', pista='".$pista."' WHERE codigo='".$codigo."' ";
                    echo '
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </symbol>
                    </svg>
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="20" height="20" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                      <div>
                        Se modificó correctamente
                      </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                                      
                    ';
                    $modificar=mysqli_query($conexion,$sql);

                }
                 ?>

                 <?php 
                 //VOY A ELIMINAR
                    if (isset($_POST['eliminarPista'])) {
                        $conexion=conectar();
                        $categoria=$_POST['selectCategoria'];
                        $codigo=$_POST['codigo'];
                        $precio=$_POST['precio'];
                        $nombrepista=$_POST['nombrepista'];

                    $sql="DELETE FROM tracks WHERE codigo='".$codigo."'";
                    echo '
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
                  <div class="alert alert-danger d-flex align-items-center" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="20" height="20" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                      <div>
                        Ha eliminado contenido!
                      </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';

                    $eliminar=mysqli_query($conexion,$sql);
                }
                 ?>

                        <div class="row input-group input-group-sm mt-5 mb-3">
                        <div class="col-3"> 
                            <button name="guardarPista" class="btn btn-outline-dark" >Guardar</button>
                        </div>

                        <div class="col-3">
                            <button name="modificarPista" class="btn btn-outline-dark">Modificar</button>
                        </div>
                        <div class="col-3">
                            <button name="eliminarPista" class="btn btn-outline-dark">Eliminar</button>
                        </div>

                    </div>
                </form> 
            </div>
            
            <div class="col-6 tablaPistas" id="div2">
                <div class="tablaPistas">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr style="font-family:Courier">
                            <th scope="col">Categoría</th>
                            <th scope="col">Código</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Pista</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        $conexion=conectar();
                        $listarPistas=mysqli_query($conexion, "SELECT * FROM tracks");
                        while($datos=mysqli_fetch_array($listarPistas)){
                            echo '
                                <tr>
                                    <th scope="row">'.$datos['categoria'].'</th>
                                    <th>'.$datos['codigo'].'</th>
                                    <th>'.$datos['precio'].'</th>
                                    <th>'.$datos['pista'].'</th>
                                </tr>
                            ';
                        }
                        mysqli_close($conexion);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
</div>
</div>

  <script src="js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>

</body>
</html>


    