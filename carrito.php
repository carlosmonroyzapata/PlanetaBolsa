<?php

session_start();
require 'php/database.php';
include 'header.php';

if(isset($_POST['submit'])){ 
  
foreach($_POST['quantity'] as $id_producto => $cantidad) { 
    if($cantidad==0) { 
        unset($_SESSION['cart'][$id_producto]); 
    }else{ 
        $_SESSION['cart'][$id_producto]['cantidad']=$cantidad; 
    } 
} 
  //print_r($_SESSION['cart']);
}

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
	$ids=array_keys($_SESSION['cart']);
	$in  = str_repeat('?,', count($ids) - 1) . '?';
	$records = $conn->prepare("SELECT * FROM producto WHERE id_producto IN ($in)");
	$records->execute($ids); 
	$products = $records->fetchAll(PDO::FETCH_ASSOC); 
 


?>

<form method="POST"> 
	<table class="tabla-carrito"> 

	<tr> 
		<td>Producto</td> 
		<td>Cantidad</td> 
		<td>Precio ud.</td> 
		<td>Precio Producto</td> 
	</tr> 

	<?php
	$totalprice=0;
	foreach ($products as $product) {
		$producto_carrito=$_SESSION['cart'][$product['id_producto']];
		$subtotal=$producto_carrito['precio']*$producto_carrito['cantidad'];
		$totalprice+=$subtotal;     
		?> 
		<tr> 
			<td><?php echo $product['producto'] ?></td> 
			<td><input type="text" name="quantity[<?php echo $product['id_producto'] ?>]" size="5" 
				value="<?php echo $producto_carrito['cantidad'] ?>" /></td> 
				<td><?php echo $product['precio'] ?>€</td> 
				<td ><?php echo $subtotal ?>€</td> 
			</tr> 
			<?php 

		} 
		?> 
		<tr class="w3-blue"> 
			<td colspan="4">Total a Pagar: <?php echo $totalprice ?>€</td> 
		</tr> 



		</table>

        <center>
		<button class="botones"type="submit" name="submit" style="font-size: 13px;">Actualizar</button>
		<p>Recuerda, si pones cantidad 0, borraras el articulo de tu carrito.</p>
		</center>
		
</form>

  <section class="boton-pagar">
  	<center>
  	<div>
  		<form action="pagar.php" method="GET">
  		<button type="submit" style="font-size: 25px; color:green ;">Pagar</button>
  		</form>
  	</div>
  </center>
  </section>
    

<?php  
}
else{
?>

<div>carrito esta vacio</div>

<?php
}
?>
<?php
include "footer.php";
?>