<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location:index.php");
}else{
    if($_SESSION['user'] == "ok"){
        $nombreUsuario = $_SESSION["nombreUsuario"];
    }
}

?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="../../css/bootstrap.min.css" />
</head>
<body>

<?php $url="http://".$_SERVER['HTTP_HOST'] ?>

<nav class="navbar navbar-expand navbar-dark bg-danger">
  <div class="nav navbar-nav">
    <a class="nav-item nav-link" href="<?php echo $url."/admin/inicio.php"?>">Admin</a>
    <a class="nav-item nav-link" href="<?php echo $url."/admin/inicio.php"?>">inicio</a>
    <a class="nav-item nav-link" href="<?php echo $url."/admin/sections/libros.php"?>">libros</a>
    <a class="nav-item nav-link" href="<?php echo $url."/src";?>">ir al sitio</a>
    <a class="nav-item nav-link" href="<?php echo $url."/admin/sections/cerrar.php"?>">cerrar session</a>
  </div>
</nav>

<div class="container">
<br><br>
    <div class="row">
