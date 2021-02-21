<?php

  session_start();
  require 'php/database.php';

if (isset($_GET['addToCart'])) {

	 $id=intval($_GET['addToCart']); 

        if(isset($_SESSION['cart'][$id])){ 

            $_SESSION['cart'][$id]['cantidad']++; 
              
        }else{ 
            $records = $conn->prepare('SELECT * FROM producto WHERE id_producto = :id');
            $records->bindParam(':id', $id);
            $records->execute(); 
            $results = $records->fetch(PDO::FETCH_ASSOC);
            //print_r($results);
            if ($results) {
            	 $_SESSION['cart'][$id]=array(
            	"precio"=>$results['precio'],
            	"cantidad"=>1);
            }
           
     } 
     //print_r($_SESSION['cart']);
} 
 
?>
<?php
include "header.php";
	?>

<body>

	


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
		          	<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($productos->imagen).'"/>';?>
		            
		                
		          </div>
		          <div class="card__content">
		            <h3 class="card__title">
		              <?php echo $productos->producto  ?>
		            </h3>
		            <div class="card__description">
		              <?php echo $productos->descripcion  ?><br><?php echo $productos->precio  ?>
		              <a  class="link_carrito" href="shop.php?addToCart=<?php echo $productos->id_producto;?>">
		              	<i class="fas fa-shopping-cart" style="font-size: 36px; color:green ;"  name="carrito"></i></a>
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