<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,intial-scale=1">
	<title>Soxonabox Ropa Ecologica y Etica</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:500,900" rel="stylesheet">
	
	<link rel="stylesheet" href="css/all.min.css">

</head>
<body>
	<header class="main-header">
		<div class="l-container main-header__block ">
		
			<div class="imagen-logo"><a href="index.php"><img  src="img/IMAGEN_page-0001.jpg" alt="logo" class="main-logo" width="80px" ></a></div>
			<div class="carrito">
				<a href="carrito.php"><i class="fas fa-shopping-cart">
					(<?php
					  echo (empty($_SESSION['cart']))?0:count($_SESSION['cart']);
					?>)
					</i>
				</a>
			</div>
			
			
					
			<!--Menu Hamburguesa -->
			<div class="main-menu-toggle" id="main-menu-toggle"><!--id for javascript -->
				menu
				</div>
					<nav class="main-nav" id="main-nav"><!--id for javascript -->			
						<ul class="main-menu">
								
							<li class="main-menu-item">
								<a class="main-menu-link" href="index.php#mision">Misión</a></li>
							<li class="main-menu-item">
								<a class="main-menu-link" href="index.php#vision">Visión</a></li>
							<li class="main-menu-item">
								<a class="main-menu-link " href="index.php#contact"><i class="far fa-question-circle question"></i></a></li>	
							<li class="main-menu-item">
								<a class="main-menu-link" href="shop.php"><i class="fas fa-store"><br><span>Shop</span></i></a></li>
									<!-- <li class="main-menu-item">
										<a class="main-menu-link" href="#">Login</a></li> -->
							<li class="main-menu-item">
								<a href="login.php"><i class="fas fa-sign-in-alt"><br><span>Login</span></i></a></li>
							<li class="main-menu-item">
								<a class="main-menu-link" href="signup.php"><i class="fas fa-user-plus"><br><span>SignUp</span></i></a></li>
							<li class="main-menu-item last">
							    <a href="logout.php"><i class="fas fa-sign-out-alt"><br><span>Logout</span></i></a></li>
						</ul>
					</nav>
			<!--Menu normal  -->		
		</div>		
	</header>
