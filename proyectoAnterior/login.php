<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /soxonabox/');
  }
  require 'php/database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id_usuario, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute(); 
    $results = $records->fetch(PDO::FETCH_ASSOC);//obtener datos 

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id_usuario'];
      header('Location: /soxonabox/');//redireccionar a la pagina inicial
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet"  type="text/css" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:500,900" rel="stylesheet">

  </head>
  <body>

    <header class="main-header">
      <div class="l-container main-header__block">
        <div class="imagen-logo"><a href="http://localhost/soxonabox/"><img  src="img/IMAGEN_page-0001.jpg" alt="logo" class="main-logo" width="80px" ></a></div>
      <div class="carrito">
        <a href="login/login.php"><i class="fas fa-shopping-cart"></i></a>
      </div>  
      </div>
<!--  menu hamburguesa-->
      <div class="main-menu" id="main-menu">
        <ul class="main-menu-item">
          <il class="main-menu-link"> <a href="http://localhost/soxonabox/shop_Lista.php"> shop </a></il>
          <il class="main-menu-link"> <a href=""> mision </a></il>
          <il class="main-menu-link"> <a href=""> vision </a></il>

        </ul>
        
      </div>

    </header>
  

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input type="submit" value="Submit">
    </form>
<!----------------------------------------------------------------------------->
  <?php
include "footer.php";
  ?>

  </body>
</html>
