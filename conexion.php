<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
function conectar(){
	try{
		$conexion=mysqli_connect(server,usuario,clave,nombreBD);
		mysqli_query($conexion,"SET NAMES 'utf8'");
		return $conexion;
	}catch(mysqli_sql_exception $e){
		header('location:error.php');
	}
}


?>