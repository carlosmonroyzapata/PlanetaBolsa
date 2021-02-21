<?php
include "php/database.php";
session_start();

?>
<?php

if (!isset($_SESSION['user_id']) || empty($_SESSION['cart'])) {
 header('Location: /soxonabox/');

}

if (isset($_POST['pagar'])){
  try {
    $conn->beginTransaction();


    $sql = "INSERT INTO ventarealizada (id_user,nombrecompleto,numerotarjeta,direccion,ciudad) VALUES (:id_user,:nombrecompleto,:numerotarjeta,:direccion,:ciudad)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_user', $_SESSION['user_id']);
    $stmt->bindParam(':nombrecompleto', $_POST['nombrecompleto']);
    $stmt->bindParam(':numerotarjeta', $_POST['numerotarjeta']);
    $stmt->bindParam(':direccion', $_POST['direccion']);
    $stmt->bindParam(':ciudad', $_POST['ciudad']);

    if ($stmt->execute()) {
      $ventaid=$conn->lastInsertId();
      foreach ($_SESSION['cart'] as $id_producto => $producto_carrito) {
       $sql = "INSERT INTO ventas_productos (cantidad,id_venta,id_producto,precio) VALUES (:cantidad,:id_venta,:id_producto,:precio)";
       $stmt2 = $conn->prepare($sql);
       $stmt2->bindParam(':id_venta', $ventaid);
       $stmt2->bindParam(':id_producto', $id_producto);
       $stmt2->bindParam(':cantidad', $producto_carrito['cantidad']);
       $stmt2->bindParam(':precio',  $producto_carrito['precio']);
       $stmt2->execute();
      }
     $conn->commit();
     unset($_SESSION['cart']);
   }
  } catch(PDOExecption $e) { 
    $conn->rollback();
    print "Error!: " . $e->getMessage() . "</br>";
  }
}

?>
<?php
include "header.php";
if(!empty($_SESSION['cart'])){

?>
<section class="finalizar-pago">
  <form method="post">

    <h3>Introduce tus Datos</h3>

    <input class="controles" name="nombrecompleto" id="nombre" type="text" placeholder="Nombre completo">
    <input class="controles" name="direccion" id="direccion" type="text" placeholder="Direccionn">
    <input class="controles" name="ciudad" id="ciudad" type="text" placeholder="Ciudad">
    <input class="controles" name="numerotarjeta" id="numerotarjeta" type="text" placeholder="Numero Tarjeta">
    <p>Estoy de acuerdo con  <a href="#">terminos y condiciones</a></p>
    <input class="botons" value="Finalizar Pago" type="submit" name="pagar" >

  </form>
</section>
<?php

   }else{ 
?>

  <p>Gracias por tu compra</p>

<?php  
}
?>
<?php
include "footer.php"
?>
