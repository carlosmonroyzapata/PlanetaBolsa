<?php
 define('DB_SERVER', 'localhost');
 define('DB_USERNAME', 'root');
 define('DB_PASSWORD', '');
 define('DB_DATABASE', 'soxonabox');
 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

 echo 'base conectada';

 ?>