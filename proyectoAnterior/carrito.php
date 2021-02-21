<?php
require "php/Ocarrito.php";
require "php/database.php" ;
session_start();



//verificar el  usuario logeado
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
 ///////////////////////////////////////////////////////////////////////////////////////


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,intial-scale=1">
	<title>Carrito Soxonabox</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:500,900" rel="stylesheet">
	<link rel="stylesheet" href="../css/all.min.css">
<style>


</style>
</head>
<?php if(!empty($user)): ?>
<body>
<header class="main-header">
		<div class="l-container main-header__block ">
		
			<div class="imagen-logo"><a href="#"><img  src="img/IMAGEN_page-0001.jpg" alt="logo" class="main-logo" width="80px" ></a></div>
			
			<!--Menu normal  -->		
		</div>		
	</header>

	<div class="breadcrumbs">
				<a href="index.php">Inicio</a><span> -> </span>
				<a href="#">Carrito</a><span> -> </span>
				<a href=""> Bienvenido usuario  <b><?= $user['email']; ?></b></a>
		
	</div>	
<div class="carritoContenedor">
<h1>Carrito</h1><hr>
	<?php  
	$longitud = $_SESSION['carrito']->num_productos;
	$max_mostrar = 4 ;
	$npmostrados = 0;
		echo "Mostrando hasta ".$max_mostrar. " articulos del carrito";
		for ($i=0; $i < $longitud && $npmostrados<$max_mostrar; $i++) {
			if ($_SESSION['carrito']->array_id_prod[$i] != 	0) {

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
					echo '<div class="quitar">';
						echo "<a href='quitar.php?np=$i'>Quitar</a>";
					echo "</div>";//fin echo
				echo '</div>' ;
				$npmostrados++;
			}//fin del if  
		}
	echo '<div class="montante">
			<span>Montante: '.$_SESSION['carrito']->montante.'€</span>  
		</div>';
	?>
	<a href="shop.php">Seguir comprando</a><br>
	<a href="facturar.php">Tramitar pedido</a>
	</div>

</body>
</html>
<!--session destroy para pruebas. hay que borrarlo para mantener la sesion --> 
<?php /*session_destroy();*/ ?>

<!-- Verificar el usuario logeado -->



 

<?php else: ?>
  <h1>Please Login or SignUp</h1>

  <a href="login.php">Login</a> or
  <a href="signup.php">SignUp</a>
<?php endif; ?>