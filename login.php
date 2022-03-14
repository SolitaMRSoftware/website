<?php
require_once("configuracion.php");
include("conexion.php");

if (isset($_POST['iniciarSesion'])) {
	if (!empty($_POST['emailUsuario']) or !empty($_POST['claveUsuario'])) 
	{
	
	$conexion=conectar();
	$email=$_POST['emailUsuario'];
	$clave=$_POST['claveUsuario'];
	$claveEncriptada=crypt($clave, "tercero");
	$sql="SELECT * FROM usuarios WHERE emailUsuario='".$email."' AND claveUsuario='".$claveEncriptada."' ";
	$buscar=mysqli_query($conexion,$sql);
	if (mysqli_num_rows($buscar)>0) {
		while ($datos=mysqli_fetch_array($buscar)){
			$_SESSION['usuario']=$datos['nombreUsuario'];
			$_SESSION['email']=$datos['emailUsuario'];
			$_SESSION['tipo']=$datos['tipoUsuario'];
			header('location:tracks.php');
		}		
	}else{
		$errorSesion="Email o contraseña incorrecta";
	}
}else{
	$errorSesion="Complete los campos";
}
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

<div class="container col-5 mt-5 mb-5">
	<form action="" method="POST">
		<div class="mb-3">	
			<label for="exampleImputEmail1" class="form-label">Email</label>
			<input name="emailUsuario" type="email" class="form-control" id="exampleImputEmail1" aria-describedby="emailHelp" value="<?php if(isset($errorSesion)){echo $_POST['emailUsuario'];} ?>"required>
			
			<div id="emailHelp" class="form-text " style="color:black;">Nunca compartiremos tu e-mail con nadie</div>
			</div>
	
		<div class="mb-3">	
			<label for="exampleImputPassword1" class="form-label">Password</label> 
			<input name="claveUsuario" type="password" class="form-control" id="exampleImputPassword1"required>
		</div>
	<?php 
	if (isset($errorSesion)) {
	 	echo '<h4 style="color:black">'.$errorSesion.'</h4>';
	 } ?>

<div align="center">
        <div class="col-12"><br>	 
	<button type="submit" name="iniciarSesion"
			class="btn btn-dark text-white col-12 mt-5">Ingresar</button>
</form>
</div>

	<a class="nav-link" style="color:#05DFD7" href="registro.php">Crear Cuenta</a>
</div>

<?php
require_once("pie.php");?>


<script src="js/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>


</body>
</html>

