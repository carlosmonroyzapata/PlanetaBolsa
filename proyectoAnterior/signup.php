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
    header("Location: /soxonabox/login/login.php");
  
  } else {
    $message = 'Sorry there must have been an issue creating your account';
  }
}
 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>



    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form  action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input id="password" name="password" type="password" placeholder="Enter your Password">

      <input type="submit"    value="Submit" >
    </form>
    <script type="text/javascript">
  
    //  onclick= "validarPasswd()"function validarPasswd(){
    //  var pass= document.getElementById("password");
    //  var confirmPass= document.getElementById("confirm_password");
    //  if (pass != confirmPass) {
    //  alert("Las passwords deben de coincidir");
    //  return false;
    //  }  else {
    //   alert("Todo esta correcto");
    //   return true; 
    //  }
    // }
   
     //Que no haya espacios en blanco en la contraseña
  
    </script>
 


  </body>
</html>
