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
<?php
include "header.php";
?>

   <?php
    if(!empty($message)): ?>
      <p> <?= $message ?></p>   
    <?php endif; ?>

  
    <div class="container_login">
      <div class="col-sm-8">
        <center>
         <h1 class="titulo_login">Login</h1>
        </center>  

        <div class="container_login_datos">

        <form action="login.php" method="POST" class="form_login">
          <center>
          <input name="email" type="email" placeholder="Introduce tu correo"><br>
          <input name="password" type="password" placeholder="Introduce tu palabra clave"><br>
          <input type="submit" value="Entrar" ><br>
        </center>
        </form>
        <center>
        <span><a href="signup.php">SignUp</a></span>
        </center>
      
      </div>
    </div>
  
    <?php
     include "footer.php";
    ?>

  </body>
</html>
