<?php 
function guardarCompra($codigo,$precio,$nombrepista,$emailUsuario)
	{
	$conexion=conectar();
	$sql="INSERT INTO compra(idArticulo,precioCompra,pistaComprada,emailUsuario) VALUES('".$codigo."','".$precio."','".$nombrepista."','".$emailUsuario."')";
	$guardarCompra=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
}
?>
