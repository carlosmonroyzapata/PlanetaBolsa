<?php
  session_start();
  require 'php/database.php';

?>


	<?php
include "header.php";
	?>

	<div class="breadcrumbs">
		<span> -> </span><a href="index.html">Estas en index.php</a>

</div>	
</div>
	<div class="banner">
		<div class="main-banner parallax">
			<!--TO DO responsive image 
			-->
				
			</div>
			<div class="main-banner-content">
				<h1 class="main-banner-title">PlanetaBolsa</h1>
				<p class="main-banner-description">Todo tipo de bolsas para un solo planeta</p>
			</div>
	</div>
 


	<main>
		<section class="mision" id="mision">
			<div class="main-section-div">
					<h2>Misión</h2>
					<p>Cada vez estamos mas interezados en tener porductos mas sostenibles con el medio hambiente, y en la misma linea que sean lo mas utiles para nuestra vida cotidiana, por ello en PlanetaBolsa nos enfocamos en buscar y comercializar bolsas que cumplan con las espectativas de nuestros clientes</p>
			</div>
			
		</section>
		<section id="vision" class="vision" >
			<div class="main-section-div" >
				<h2>Visión</h2>
				<p>Trabajamos para ampliar nuestra oferta no solo de calcetines sino de moda en general como calzado ropa de abrigo y diversos complementos elaborados en materiales naturales o reciclados. Pretendemos proporcionar un plataforma de venta de productos ecologicos, sostenibles y éticos para ayudar a artesanos e industrias sostenibles</p></div>
			
		</section>
		
		

		
	
		<section class="contact" id="contact">
			<div class="main-section-div">
				<h2>Contacto</h2>
				<form class="contact-form" action="send.php" method="post" name="contact">
					<input type="text" name="name" placeholder="Nombre" required>
					<input type="email" name="email" placeholder="Correo Electrónico" required>
					<input type="tel" name="phone" placeholder="Telefono">
					<textarea id="message" name="message" heigth= "10rem" placeholder="Su mensaje" required></textarea>
					<a href="#" class="button">Enviar</a>
				</form>
			</div>
		</section>


	</main>
		
	<footer class="site_footer">
			<div class="contenedor clearfix">
			  <div class="footer_informacion">
				<h3>Sobre <span>PlanetaBolsa</span></h3>
				<p>Proyecto web realizado por Carlos David Monroy Zapata.</p>
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
  <p class="copyright">Todos los derechos Reservados PlanetaBolsa 2021</p>
  <script type="text/javascript" src="js/scripts.js"></script>

</body>
</html>
