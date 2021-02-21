

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:500,900" rel="stylesheet">

  </head>
  <body>

    <header class="main-header">
      <div class="l-container main-header__block">
        <div class="imagen-logo"><a href="http://localhost/soxonabox/index.html"><img  src="img/IMAGEN_page-0001.jpg" alt="logo" class="main-logo" width="80px" ></a></div>
      <div class="carrito">
        <a href="login/login.php"><i class="fas fa-shopping-cart"></i></a>
      </div>  
      </div>
<!--  menu hamburguesa-->
      <div class="main-menu" id="main-menu">
        <ul class="main-menu-item">
          <il class="main-menu-link"> <a href="http://localhost/soxonabox/carrito.php"> carrito </a></il>
          <il class="main-menu-link"> <a href=""> prueba </a></il>
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

    <form action="http://localhost/soxonabox/login/comprueba_login.php" method="POST">
      <table>
        <tr>
          <td class="izq"> email:</td>
          <td class="der"><input type="text" name="email"></td>
        </tr>
        <tr>
          <td class="izq"> password:</td>
          <td class="der"> <input type="password" name="password"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="enviar" value="LOGIN"></td>
        </tr>

      </table>
    </form>
  </body>
</html>
