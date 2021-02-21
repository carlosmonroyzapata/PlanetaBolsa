<?php

  session_start();
  require 'login/php/database.php';

 
?>
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

	<?php
include "header.php";
	?>


	<div class="breadcrumbs">
				<a href="index.php">Inicio</a><span> -> </span>
				<a href="#">Shop</a>
		
	</div>	
	<?php
		$sentencia = $conn->query ("SELECT * FROM producto;");
		$producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
	?>

		<section class="signup-login">	
		</section>

		<section class="shop">
			<div class="cards-grid">

				<!-------------------------------------------------------------->
				<?php foreach ($producto as $productos){ ?>
				<div class="card">
		          <div class="card__img">
		          	
		            <?php echo  "<img src='{productos->imagen}'>";?>
		                
		          </div>
		          <div class="card__content">
		            <h3 class="card__title">
		              <?php echo $productos->producto  ?>
		            </h3>
		            <div class="card__description">
		              <?php echo $productos->descripcion  ?><br><?php echo $productos->precio  ?>
		            </div>
		            <div class="card__footer">
		              <a  class="link_carrito" href=""><i class="fas fa-shopping-cart" name="carrito"></i></a>
								<a  class="link_carrito" href=""><i class="fas fa-credit-card" name="carrito"></i></a>
		            </div>
		          </div>
		        </div>
		        <?php }?>  
		    
		    </div><!--end card's grid -->
	  
		</section>
	</main>
		
	<?php
include "footer.php";
	?>
	<p class="copyright">Todos los derechos Reservados SOXONABOX 2019</p>
	<script type="text/javascript" src="js/scripts.js"></script>

</body>
</html>