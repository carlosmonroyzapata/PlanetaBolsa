
<?php 
	require "php/Ocarrito.php";
	session_start();
	if(!isset($_SESSION['carrito'])){
	 	$_SESSION['carrito'] =  new Ocarrito();
	}
	$_SESSION['carrito']->introduce_producto(
		$_POST['id_prod'],
		$_POST['nombre_prod'],
		$_POST['cantidad_prod'],
		$_POST['precio_prod']);
	header("location: carrito.php");
 ?>