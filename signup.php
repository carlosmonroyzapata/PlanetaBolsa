<?php

require 'php/database.php';

$message = '';


if (!empty($_POST['email']) && !empty($_POST['password']) ) {
  $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(':password', $password);
  
 
  

  if ($stmt->execute()) {
    $message = 'Successfully created new user';
    header("Location: /soxonabox/login.php");
  
  } else {
    $message = 'Sorry there must have been an issue creating your account';
  }
}
 
?>
<?php
include "header.php";
?>



    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

     <center><h1>SignUp</h1></center>
    
    <center>
    <form  action="signup.php" method="POST">
      <input name="email" type="email" placeholder="Introduce tu correo"><br>
      <input id="password" name="password" type="password" placeholder="Introduce tu palabra clave"><br>

      <input type="submit"    value="Registrar" ><br>
    </form>
    </center>
    <script type="text/javascript">
    </script>
    <center>
    <span><a href="login.php">Login</a></span><br>
    </center>

<?php
include "footer.php";
?>
