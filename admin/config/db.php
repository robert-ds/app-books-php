<?php

$host       = "mysql-m";
$db         = "m3517544_libros";
$user       = "m3517544rw";
$password   = "chocolate";

try {
  $connect = new PDO("mysql:host=$host;dbname=$db",$user,$password);

}catch(Exception $e){
  echo $e->getMessage();
}


?>
