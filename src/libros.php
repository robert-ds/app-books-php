<?php include_once("../template/cabecera.php")?>

<?php include("../admin/config/db.php");

$SQL = "SELECT * FROM `libros` ";
$query = $connect->prepare($SQL);
$query->execute();
$ebookList = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<?php foreach ($ebookList as $libro){?>
  <div class="col-md-3">

    <div class="card">
      <img class="card-img-top" width="200" height="300" src="../imgs/<?php echo $libro['imagen']; ?>" alt="" />
      <div class="card-body">
        <h4 class="card-title"><?php echo $libro['nombre']; ?></h4>
        <a id="" class="btn btn-primary" href="" role="button">Leer</a>
      </div>
    </div>

  </div>

<?php }?>

<?php include_once("../template/pie.php")?>
