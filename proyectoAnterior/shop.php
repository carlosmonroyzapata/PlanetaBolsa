<?php
  session_start();

  require 'php/database.php';


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,intial-scale=1">
	<title>Soxonabox Ropa Ecologica y Etica</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:500,900" rel="stylesheet">
	<link rel="stylesheet" href="../css/all.min.css">

</head>
<body>
<?php if(!empty($user)): ?>
		<header class="main-header">
				<div class="l-container main-header__block ">
						<div class="imagen-logo"><a href="index.php"><img  src="img/IMAGEN_page-0001.jpg" alt="logo" class="main-logo" width="80px" ></a></div>
			<div class="carrito">
				<a href="carrito.php"><i class="fas fa-shopping-cart"></i></a>
			</div> 
							
					<!--Menu Hamburguesa -->
					<div class="main-menu-toggle" id="main-menu-toggle"><!--id for javascript -->
						</div>
							<nav class="main-nav" id="main-nav"><!--id for javascript -->			
								<ul class="main-menu">	
									<li class="main-menu-item">
										<a href="index.php"><i class="fas fa-home"><br><span>Home</span></i></a>
								<li class="main-menu-item last">
							    <a href="login/logout.php"><i class="fa fa-sign-out"><br><span>Logout</span></i></a></li>
										</ul>
							</nav>
					<!--Menu normal  -->		
				</div>		
			</header>	
	<div class="breadcrumbs">
				<a href="index.php">Inicio</a><span> -> </span>
				<a href="#">Shop</a><span> -> </span>
				<a href=""> Bienvenido usuario  <b><?= $user['email']; ?></b></a>
		
	</div>	
	
	<!-- <div class="main-banner">
		
		<img src="img/socks-original.jpg" class="main-banner__hero-image">
			<div class="main-banner-content">
				<h1 class="main-banner-title">Soxonabox</h1>
				<p class="main-banner-description">Estilo Sostenible y Etico</p>
			</div>
		</div> -->
	<main>		

		<section class="signup-login">	
		</section>

		<section class="shop">
			<div class="cards-grid">
				<!--------------------------------------------------------------------------->
		        <div class="card">
		          <div class="card__img">
		            <img src="../img/cal3.jpg"
		                 alt="Poster del objeto ">
		          </div>
		          <div class="card__content">
		            <h3 class="card__title">
		              Tropical Cool  
		            </h3>
		            <div class="card__description">
		            	Colorido y refrescante diseño de plantas tropicales, pintado a mano, realizado en algodón y rayón de bambú certificado. Luce tu frescura con orgullo ecológico.<br>24.99€
		            </div>
		            <div class="card__footer">
		              <form class="comprar" action="echaralcarrito.php" method="post" name="comprar">		              	
						<input id="id_prod" type="hidden" name="id_prod" value="3">
						<input id="nombre_prod" type="hidden" name="nombre_prod" value="Tropical_Cool">
						<input id="cantidad_prod" type="number" name="cantidad_prod" value="1">
						<input id="precio_prod" type="hidden" name="precio_prod" value="24.99">
						<input class="button" type="submit" value="Comprar" >
					  </form>
		            </div>
		          </div>
		        </div>
		        <!------------------------------------------------------------------------------->
		        <div class="card">
		          <div class="card__img">
		            <img src="../img/cal4.jpg"
		                 alt="Poster del objeto ">
		          </div>
		          <div class="card__content">
		            <h3 class="card__title">
		              Run Forest Run  
		            </h3>
		            <div class="card__description">
		               Para correr, caminar por senderos y bosques o pasear, Estos calcetines le mantendran fresco y confortable en cualquier situacion, reforzados y realizados en algodón y rayón de bambú ecológico<br>24.99€
		            </div>
		            <div class="card__footer">
		              <form class="comprar" action="echaralcarrito.php" method="post" name="comprar">		              	
						<input id="id_prod" type="hidden" name="id_prod" value="4">
						<input id="nombre_prod" type="hidden" name="nombre_prod" value="Run_Forest">
						<input id="cantidad_prod" type="number" name="cantidad_prod" value="1">
						<input id="precio_prod" type="hidden" name="precio_prod" value="24.99">
						<input class="button" type="submit" value="Comprar" >
					  </form>
		            </div>
		          </div>
		        </div>
		        <!-------------------------------------------------------------------------------->

		        <div class="card">
		          <div class="card__img">
		            <img src="../img/cal5.jpg"
		                 alt="Poster del objeto ">
		          </div>
		          <div class="card__content">
		            <h3 class="card__title">
		              Autumn 
		            </h3>
		            <div class="card__description">
		              Cálidos y realizados en lana de la mejor calidad. Los mejores esquiladores de America mimaron a sus ovejas para poder pelarlas sin atarlas ni maltratarlas<br>24.99€
		            </div>
		            <div class="card__footer">
		              <form class="comprar" action="echaralcarrito.php" method="post" name="comprar">		              	
						<input id="id_prod" type="hidden" name="id_prod" value="5">
						<input id="nombre_prod" type="hidden" name="nombre_prod" value="Autumn">
						<input id="cantidad_prod" type="number" name="cantidad_prod" value="1">
						<input id="precio_prod" type="hidden" name="precio_prod" value="24.99">
						<input class="button" type="submit" value="Comprar" >
					  </form>
		            </div>
		          </div>
		        </div>
		        <!------------------------------------------------------------------------------>
		        <div class="card">
		          <div class="card__img">
		            <img src="../img/cal6.jpg"
		                 alt="Poster del objeto ">
		          </div>
		          <div class="card__content">
		            <h3 class="card__title">
		              Tarantopía  
		            </h3>
		            <div class="card__description">
		              Para los amantes del cine. Pintados a mano en algodón 100% no pasarán indvertidos.Un chute de aire fresco de diseño vintage<br>24.99€
		            </div>
		             <div class="card__footer">
		              <form class="comprar" action="echaralcarrito.php" method="post" name="comprar">		              	
						<input id="id_prod" type="hidden" name="id_prod" value="6">
						<input id="nombre_prod" type="hidden" name="nombre_prod" value="Tarantopia">
						<input id="cantidad_prod" type="number" name="cantidad_prod" value="1">
						<input id="precio_prod" type="hidden" name="precio_prod" value="24.99">
						<input class="button" type="submit" value="Comprar" >
					  </form>
		            </div>
		          </div>
		        </div>
		        <!---------------------------------------------->

		            
		            <div class="card__content">
	            <h3 class="card__title">
	              Fruit Passion
	            </h3>
	            <div class="card__description">
	            	Cuatro pares de calcetines con frutas bordadas a mano, colores alegres y atrevidos para que todos vean que amas el color y la naturaleza<br>
	            	29.90€
	            </div>
	            <div class="card__footer">
	              <a href="login/login.php" class="button">Comprar</a>
	            </div>
	          </div>
	        </div>
	        <div class="card">
	          <div class="card__img">
	            <img src="img/cal2.jpg"
	                 alt="Poster del objeto ">
	          </div>
	          <div class="card__content">
	            <h3 class="card__title">
	              Jungle Adventure 
	            </h3>
	            <div class="card__description">
	              Par de calcetines altos para los aventureros incansables, ideales para bicicleta y running o simplemente para que en toda la ciudad sepan que eres un superviviente. 100% algodón ecológico<br>24.99€
	            </div>
	            <div class="card__footer">
	              <a href="login/login.php" class="button">Comprar</a>
	            </div>
	          </div>
	        </div>
		           

		    </div><!--end card's grid -->    
		</section>

		
		<section class="signup-login">	
		</section>


	          

	</main>
		
	
	<footer class="site_footer">
			<div class="contenedor clearfix">
			  <div class="footer_informacion">
				<h3>Sobre <span>SOXONABOX</span></h3>
				<p>Proyecto final realizado por Borja Fernandez Gomez, Carlos Monroy Zapata y Pedro Osorio Rodriguez, estudiantes de segundo año en IFP en derrallo de aplicacione web.</p>
			  </div>
			  
			  <div class="menu_footer">
				<h3>Redes <span>Sociales</span></h3>
				<nav class="redes-sociales">
				  <a href=""><i class="fab fa-facebook"></i></a>
				  <a href=""><i class="fab fa-twitter-square"></i></a>
				  <a href=""><i class="fab fa-pinterest-square"></i></a>
				  <a href=""><i class="fab fa-youtube"></i></a>
				  <a href=""><i class="fab fa-instagram"></i></a>
				</nav>
			  </div>
			</div>
		  </footer>
	<p class="copyright">Todos los derechos Reservados SOXONABOX 2019</p>
	<script type="text/javascript" src="js/scripts.js"></script>
	<?php else: ?>
  <h1>Please Login or SignUp</h1>

  <a href="login.php">Login</a> or
  <a href="signup.php">SignUp</a>
<?php endif; ?>	
</body>
</html>