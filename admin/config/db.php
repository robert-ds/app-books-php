<?php

$host       = $MYSQLHOST;
$db         = $MYSQLDATABASE;
$user       = $MYSQLUSER;
$password   = $MYSQLPASSWORD;

try {
  $connect = new PDO("mysql:host=$host;dbname=$db",$user,$password);

}catch(Exception $e){
  echo $e->getMessage();
}


?>
