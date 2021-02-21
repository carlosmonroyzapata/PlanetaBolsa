<?php
	require "php/Ocarrito.php";
	
	$np = $_GET['np'];
	session_start();
	require "php/database.php" ;

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <title>Quitar un producto</title>
	  <link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:500,900" rel="stylesheet">
	<link rel="stylesheet" href="../css/all.min.css">
  </head>
  <body>

  <header class="main-header">
		<div class="l-container main-header__block ">
		
			<div class="imagen-logo"><a href="#"><img  src="img/IMAGEN_page-0001.jpg" alt="logo" class="main-logo" width="80px" ></a></div>
			
			<!--Menu normal  -->		
		</div>		
	</header>

	<div class="breadcrumbs">
				<a href="index.php">Inicio</a><span> -> </span>
				<a href="carrito.php">Carrito</a><span> -> </span>
				<a href="#">Retirar producto</a><span> -> </span>
				<a href=""> Bienvenido usuario  <b><?= $user['email']; ?></b></a>
		
	</div>
	<div class="quitarContenedor">
	<?php
	  echo "Se elimina la linea: ".$np."<br><br>";
	  $_SESSION['carrito']->elimina_producto($np);
	  //echo "<br><br>Comprobando variable de sesion id: ".$_SESSION['carrito']->array_id_prod[$np];
	  echo '<a href="carrito.php"><br><br>Volver al carrito</a><br> <br>'; 
	  echo '<a href="shop.php">Seguir Comprando</a>'; 
	  ?>
	</div>
	 
  </body>
  </html>