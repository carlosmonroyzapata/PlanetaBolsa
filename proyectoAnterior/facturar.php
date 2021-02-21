<?php 

	require "php/bd_soxonabox.php";
	require "php/Ocarrito.php";
	session_start();
	require 'php/database.php';
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Facturar Pedido</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:500,900" rel="stylesheet">
	<link rel="stylesheet" href="css/all.min.css">
</head>
<body>
<header class="main-header">
		<div class="l-container main-header__block ">
		
			<div class="imagen-logo"><a href="../index.html"><img  src="img/IMAGEN_page-0001.jpg" alt="logo" class="main-logo" width="80px" ></a></div>
			
			<!--Menu normal  -->		
		</div>		
	</header>

	<div class="breadcrumbs">
				<a href="index.php">Inicio</a><span> -> </span>
				<a href="#">Factura</a><span> -> </span>
				<a href=""> Bienvenido usuario  <b><?= $user['email']; ?></b></a>
		
	</div>
	<div class="facturaContenedor">
	<?php
	$longitud = $_SESSION['carrito']->num_productos;
	$npmostrados = 0;
		for ($i=0; $i < $longitud && $npmostrados==0; $i++) {
			if ($_SESSION['carrito']->array_id_prod[$i] != 	0) {
				$npmostrados++;
			}
		}
	if($npmostrados > 0){
		echo " ".$npmostrados." articulos. Usuario numero: ".$_SESSION['user_id']."<br>";
		$nfactura = introduce_factura($_SESSION['user_id']);
		echo '<div class="numerofactura">
				<span>Factura numero: '.$nfactura.'</span>  
			</div>';
		$npmostrados=0;		
		for ($i=0; $i < $longitud ; $i++) {
			if ($_SESSION['carrito']->array_id_prod[$i] != 	0) {
				$npmostrados++;
				//actualizar existencias
				quitar($_SESSION['carrito']->array_cantidad_prod[$i],
					$_SESSION['carrito']->array_id_prod[$i]);
				//TO DO $precio from database
				detalleAFactura($i,$nfactura,
					$_SESSION['carrito']->array_id_prod[$i],
					$_SESSION['carrito']->array_precio_prod[$i],
					$_SESSION['carrito']->array_cantidad_prod[$i]);

				echo '<div class="linea">';
					echo '<div class="id_prod">
							 <span>Código de producto: '.$_SESSION['carrito']->array_id_prod[$i].'</span>
						</div>'.
					'<div class="id_nombre_prod">
						<span> Nombre: '.$_SESSION['carrito']->array_nombre_prod[$i].'</span>
					</div>'.
					'<div class="cantidad_prod">
						<span> Cantidad: '.$_SESSION['carrito']->array_cantidad_prod[$i].'</span>
					</div>'.
					'<div class="id_precio_prod">
						<span>Precio: '.$_SESSION['carrito']->array_precio_prod[$i].'€</span>
					</div>';	
				echo '</div>' ;
				
			}//fin del if  
		}
		echo '<div class="numero de lineas">
				<span>Lineas de su Factura: '.$npmostrados.'</span>  
			</div>'; 	
		echo '<div class="montante">
				<span>Total: '.$_SESSION['carrito']->montante.'€</span>  
			</div>';///////////////////////////////////////////////////////////////////////////////
		session_unset();////////////////////////////////////////////////////////////////////////
	  	session_destroy();//////////////////////////////////////////////////////////////////////
  	}//fin comprobacion si hay articulos en el carrito///////////////////////////////////////////
	else{
		echo "Su carrito esta todavía vacio"."<br>".
		'<a href="shop.php">Seguir comprando</a><br>
		<a href="factuar.php">Tramitar pedido</a>';
	}
	 ?>
	</div>
</body>
</html>