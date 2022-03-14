<?php
require_once("configuracion.php");
include("conexion.php");
if (isset($_POST['nuevoRegistro'])) {
		$conexion=conectar();
		$usuario=$_POST['usuario'];
		$email=$_POST['email'];
		$clave=$_POST['clave1'];
		$clave2=$_POST['clave2'];
		$imagen="noavatar.png";
		$tipo="user";
		if ($clave==$clave2) {
				$claveEncriptada=crypt($clave,"tercero");
				$sql="INSERT INTO usuarios(nombreUsuario,claveUsuario,emailUsuario,imagenUsuario,tipoUsuario) VALUES('".$usuario."','".$claveEncriptada."','".$email."','".$imagen."', '".$tipo."')";
				$guardar=mysqli_query($conexion,$sql);
				$_SESSION['email']=$email;
				$_SESSION['usuario']=$usuario;
				mysqli_close($conexion);
				header("location:tracks.php");
		}else{
			$errorClave="No coinciden las claves";
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
<body>
  
<?php  include('navbar.php');?>

	
	<div class="container col-5 mt-5 mb-3 text-white d-flex justify-content-center">
		<h3 style="color:black; font-family:Courier bold;">Nueva Cuenta</h3>
	</div>
	<div class="container-fluid col-5 mb-5">
		<form action="" method="POST">
			<div class="mb-3">
			  	<label class="form-label">Usuario</label>
		  		<input type="text" name="usuario" class="form-control" required>
		  	</div>

		  	<div class="mb-3">
			  	<label class="form-label">Email</label>
		  		<input type="email" name="email" class="form-control" aria-describedby="emailHelp"required>
		  	</div>

		  	<div class="mb-3">
			  	<label form="exampleInputPassword1" class="form-label">Contraseña</label>
		  		<input type="password" name="clave1" class="form-control"required>
		  		
			</div>
			<div class="mb-3">
			  	<label form="exampleInputPassword1" class="form-label">Repita Contraseña</label>
				<input type="password" name="clave2" class="form-control"required>
			</div>
		
	
			<?php 
			if (isset($errorClave)) {
			 	echo '<h4 style="color:red">'.$errorClave.'</h4>';
			 } 
			 ?>

			 <div align="center">
        <div class="col-12"><br>
			<button type="submit" name="nuevoRegistro"
			class="btn btn-dark text-white col-12 mt-2 mb-2">Crear Cuenta</button>
			</form>
			
			<a class="nav-link active" style="color:#05DFD7" aria-current="page" href="login.php">Ya Tengo Cuenta</a>
			</div>    
		</div>
		


  <script src="js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>

</body>
</html>

