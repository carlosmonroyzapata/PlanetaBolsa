<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'soxonabox';




try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}


//verificaciones de usuario logeado
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

?>

