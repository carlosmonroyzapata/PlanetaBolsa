<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
try{
	$base=new PDO("mysql: host=localhost, dbname=soxonabox", "root", "");
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="SELECT * FROM users WHERE email= :email AND password=: password";
	$resultado= $base->prepare($sql);
	$email=htmlentities(addslashes($_POST["email"]));
	$password=htmlentities(addslashes($_POST["password"]));
	$resultado->bindValue(":email",$email);
	$resultado->bindValue(":password",$password);
	$resultado->execute();
	$numero_registro=$resultado->rowCount();

	if ($numero_registro!=0){
		echo "<h2> sigue adelante </h2>";

	}else {
		header("location:http://localhost/soxonabox/login/login.php");
	}
	

}catch(exception $e){
	die ("error: " . $e->getMessage());
}



?>
</body>
</html>