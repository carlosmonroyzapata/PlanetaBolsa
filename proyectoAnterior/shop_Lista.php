<?php
 session_start();
 include 'login/php/database.php';
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

	<main>
		<?php
		$sentencia = $conn->query ("SELECT * FROM producto;");
		$producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
		?>
		<div class="tabla_productos-div">
			<h1 class="titulo_productos">Productos</h1>
			<table class="tabla_productos">
				<thead>
				<tr>
					<th>Producto</th>
					<th>Precio</th>
					<th>Descripcion</th>
					<th>Stock</th>
					<th>Imagen</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach ($producto as $productos){ ?>
						<tr>
							<td> <?php echo $productos->producto  ?></td>
							<td> <?php echo $productos->precio  ?></td>
							<td> <?php echo $productos->descripcion  ?></td>
							<td> <?php echo $productos->stock  ?></td>
							<td> <?php echo $productos->imagen  ?></td>

							<td>
								<a  class="link_carrito" href=""><i class="fas fa-shopping-cart" name="carrito"></i></a>
								<a  class="link_carrito" href=""><i class="fas fa-credit-card" name="carrito"></i></a>
						</tr>
					<?php } ?>
				</tbody>
			</table>
	</main>

<?php
include "footer.php";
?>

</body>
</html>