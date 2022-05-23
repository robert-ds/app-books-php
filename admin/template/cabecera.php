<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body>

<?php $url="http://".$_SERVER['HTTP_HOST']."/sitioweb" ?>

<nav class="navbar navbar-expand navbar-dark bg-danger">
  <div class="nav navbar-nav">
    <a class="nav-item nav-link" href="#">Admin</a>
    <a class="nav-item nav-link" href="<?php echo $url."/admin//inicio.php"?>">inicio</a>
    <a class="nav-item nav-link" href="#">libros</a>
    <a class="nav-item nav-link" href="<?php echo $url;?>">ir al sitio</a>
    <a class="nav-item nav-link" href="#">cerrar session</a>
  </div>
</nav>

<div class="container">
<br><br>
    <div class="row">
