<?php

require_once('../../index.php');

$host = $_ENV['MYSQLHOST'];
$db = $_ENV['MYSQLDATABASE'];
$user = $_ENV['MYSQLUSER'];
$password = $_ENV['MYSQLPASSWORD'];

echo $host." ".$db." ".$user." ".$password;

try {
  $connect = new PDO("mysql:host=$host;dbname=$db",$user,$password);

}catch(Exception $e){
  echo $e->getMessage();
}


?>
