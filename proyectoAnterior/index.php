<?php
  session_start();

  require 'php/database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id_usuario, email, password FROM users WHERE id_usuario = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
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
		
			<div class="imagen-logo"><a href=""><img  src="img/IMAGEN_page-0001.jpg" alt="logo" class="main-logo" width="80px" ></a></div>
			<div class="carrito">
				<a href="carrito.php"><i class="fas fa-shopping-cart"></i></a>
			</div>
			
			
					
			<!--Menu Hamburguesa -->
			<div class="main-menu-toggle" id="main-menu-toggle"><!--id for javascript -->
				</div>
					<nav class="main-nav" id="main-nav"><!--id for javascript -->			
						<ul class="main-menu">
								
							<li class="main-menu-item">
								<a class="main-menu-link" href="#mision">Misión</a></li>
							<li class="main-menu-item">
								<a class="main-menu-link" href="#vision">Visión</a></li>
							<li class="main-menu-item">
								<a class="main-menu-link " href="#contact"><i class="far fa-question-circle question"></i></a></li>	
							<li class="main-menu-item">
								<a class="main-menu-link" href="shop.php"><i class="fas fa-store"><br><span>shop</span></i></a></li>
									<!-- <li class="main-menu-item">
										<a class="main-menu-link" href="#">Login</a></li> -->
							<li class="main-menu-item">
								<a href="logout.php"><i class="fas fa-sign-out-alt"><br><span>Logout</span></i></a>
  
								</ul>
					</nav>
			<!--Menu normal  -->		
		</div>		
	</header>
	<div class="breadcrumbs">
				<a href="index.php">Inicio</a><span> -> </span>
				<a href=""> Bienvenido usuario  <b><?= $user['email']; ?></b></a>
		
	</div>
	
</div>
	<div class="banner">
		<div class="main-banner parallax">
			<!--TO DO responsive image 
			-->
				
			</div>
			<div class="main-banner-content">
				<h1 class="main-banner-title">Soxonabox</h1>
				<p class="main-banner-description">Estilo Sostenible y Etico</p>
			</div>
	</div>


	<main>
		<section class="mision" id="mision">
			<div class="main-section-div">
					<h2>Mision</h2>
					<p>La sostenibilidad y la ética desde el origen es nuestra meta, aportando estética  y el estilo. Nuestros calcetines estan realizados con materiales naturales y hechos ppor trabajadores con un sueldo digno. Presentamos una amplia gama de diseños, desde los más clásicos hasta los más atrevidos, para satisfacer la demanda de todos nuestros clientes.</p>
			</div>
			
		</section>
		<section id="vision" class="vision" >
			<div class="main-section-div" >
				<h2>Vision</h2>
				<p>Trabajamos para ampliar nuestra oferta no solo de calcetines sino de moda en general como calzado ropa de abrigo y diversos complementos elaborados en materiales naturales o reciclados. Pretendemos proporcionar un plataforma de venta de productos ecologicos, sostenibles y éticos para ayudar a artesanos e industrias sostenibles</p></div>
			
		</section>
		
		

		<section class="signup-login">	
		</section>

		<section class="shop">
			<div class="cards-grid">
	        <div class="card">
	          <div class="card__img">
	            <img src="../img/cal1.jpg"
	                 alt="Poster del objeto ">
	          </div>
	          <div class="card__content">
	            <h3 class="card__title">
	              Fruit Passion 
	            </h3>
	            <div class="card__description">
	            	Cuatro pares de calcetines con frutas bordadas a mano, colores alegres y atrevidos para que todos vean que amas el color y la naturaleza<br>
	            	29.90€
	            </div>
	            <div class="card__footer">
	              <form class="comprar" action="echaralcarrito.php" method="post" name="comprar">
	              	<input id="id_prod" type="hidden" name="id_prod" value="1">
					<input id="nombre_prod" type="hidden" name="nombre_prod" value="Fruit_Passion">
					<input id="cantidad_prod" type="number" name="cantidad_prod" value="1">
					<input id="precio_prod" type="hidden" name="precio_prod" value="29.90">
					<input class="button" type="submit" value="Comprar" >
				  </form>
	            </div>
	          </div>
	        </div>
	        <div class="card">
	          <div class="card__img">
	            <img src="../img/cal2.jpg"
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
	              <form class="comprar" action="echaralcarrito.php" method="post" name="comprar">
	              	
					<input id="id_prod" type="hidden" name="id_prod" value="2">
					<input id="nombre_prod" type="hidden" name="nombre_prod" value="Jungle_adventure">
					<input id="cantidad_prod" type="number" name="cantidad_prod" value="1">
					<input id="precio_prod" type="hidden" name="precio_prod" value="24.99">
					<input class="button" type="submit" value="Comprar" >
				  </form>
	            </div>
	          </div>
	        </div>
		</section>
		
	
		<section class="contact" id="contact">
			<div class="main-section-div">
				<h2>Contacto</h2>
				<form class="contact-form" action="send.php" method="post" name="contact">
				<input type="text" name="name" placeholder="Nombre" required>
				<input type="email" name="email" placeholder="Correo Electrónico" required>
				<input type="tel" name="phone" placeholder="telefono">
				<textarea id="message" name="message" heigth= "10rem" placeholder="Su mensaje" required></textarea>
				<a href="#" class="button">Enviar</a>
				<!--¿calcular cols según resolucion horizontal ? 
					como se averigua la resolución -->
				</form>
			</div>
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
 
<?php else: ?>
<?php?>
  <h1>Please Login or SignUp</h1>

  <a href="login.php">Login</a> or
  <a href="signup.php">SignUp</a>
<?php endif; ?>


 
</body>
</html>


