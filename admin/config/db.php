<?php

$host       = "";
$db         = "libros";
$user       = "";
$password   = "";

try {
  $connect = new PDO("mysql:host=$host;dbname=$db",$user,$password);

}catch(Exception $e){
  echo $e->getMessage();
}


?>
