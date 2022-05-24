<?php include_once('../template/cabecera.php');?>

<?php

$txtID = (isset($_POST['txtID']))? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre']))? $_POST['txtNombre'] : "";
$fileImagen = (isset($_FILES['fileImagen']['name']))? $_FILES['fileImagen']['name'] : "";
$accion = (isset($_POST['accion']))? $_POST['accion'] : "";

include('../config/db.php');

switch($accion){
  case "Agregar":
    $SQL = "INSERT INTO `libros` (`id`, `nombre`, `imagen`) VALUES (NULL, :nombre, :imagen)";
    $query = $connect->prepare($SQL);
    $query->bindParam(':nombre',$txtNombre);

    $date = new DateTime();
    $fileName = ($fileImagen != "") ? $date->getTimestamp()."_".$_FILES["fileImagen"]["name"]: "img.jpg";

    $tmpImagen = $_FILES["fileImagen"]["tmp_name"];

    if($tmpImagen != ""){
        move_uploaded_file($tmpImagen,"../../imgs/".$fileName);
    }

    $query->bindParam(':imagen',$fileName);
    $query->execute();
    break;

  case "Modificar":

    $SQL = "UPDATE `libros` SET nombre=:nombre WHERE id=:id ";
    $query = $connect->prepare($SQL);
    $query->bindParam(':id',$txtID);
    $query->bindParam(':nombre',$txtNombre);
    $query->execute();

    if($fileImagen !== ""){

      $date = new DateTime();
      $fileName = ($fileImagen != "") ? $date->getTimestamp()."_".$_FILES["fileImagen"]["name"]: "img.jpg";

      $tmpImagen = $_FILES["fileImagen"]["tmp_name"];
      move_uploaded_file($tmpImagen,"../../imgs/".$fileName);

      $SQL = "SELECT imagen FROM `libros` WHERE id=:id ";
      $query = $connect->prepare($SQL);
      $query->bindParam(':id',$txtID);
      $query->execute();
      $ebook = $query->fetch(PDO::FETCH_LAZY);

      if(isset($ebook["imagen"]) && ($ebook["imagen"] != "img.jpg")){
        if(file_exists("../../imgs/".$ebook["imagen"])){
          unlink("../../imgs/".$ebook["imagen"]);
        }
      }

      $SQL = "UPDATE `libros` SET imagen=:imagen WHERE id=:id ";
      $query = $connect->prepare($SQL);
      $query->bindParam(':id',$txtID);
      $query->bindParam(':imagen',$fileName);
      $query->execute();
    }
    header("Location:libros.php");
    break;

  case "Cancelar":
    header("Location:libros.php");
    break;

  case "Seleccionar":
    $SQL = "SELECT * FROM `libros` WHERE id=:id ";
    $query = $connect->prepare($SQL);
    $query->bindParam(':id',$txtID);
    $query->execute();
    $ebook = $query->fetch(PDO::FETCH_LAZY);

    $txtNombre = $ebook['nombre'];
    $txtImagen = $ebook['imagen'];

    break;

  case "Borrar":
    $SQL = "SELECT imagen FROM `libros` WHERE id=:id ";
    $query = $connect->prepare($SQL);
    $query->bindParam(':id',$txtID);
    $query->execute();
    $ebook = $query->fetch(PDO::FETCH_LAZY);

    if(isset($ebook["imagen"]) && ($ebook["imagen"] != "img.jpg")){
        if(file_exists("../../imgs/".$ebook["imagen"])){
            unlink("../../imgs/".$ebook["imagen"]);
        }
    }

    $SQL = "DELETE FROM `libros` WHERE id=:id ";
    $query = $connect->prepare($SQL);
    $query->bindParam(':id',$txtID);
    $query->execute();

    header("Location:libros.php");
    break;

}

// Query para mostrar los datos de la base de datos en la tabla
$SQL = "SELECT * FROM `libros` ";
$query = $connect->prepare($SQL);
$query->execute();
$ebookList = $query->fetchAll(PDO::FETCH_ASSOC);

?>

    <div class="col-md-5">

        <div class="card">
            <div class="card-header">
                Datos de Libros
            </div>

                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="txtID">ID:</label>
                            <input type="text" required readonly class="form-control" value="<?php echo $txtID;?>" name="txtID" id="txtID" placeholder="ID" />
                        </div>

                        <div class="form-group">
                            <label for="txtNombre">Nombre:</label>
                            <input required type="text" class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre"  placeholder="Nombre del Libro" />
                        </div>


                        <br/>
                        <div class="form-group">
                            <label for="fileImagen">Imagen:</label>
                          <br/>
                            <?php //echo $txtImagen;?>

                            <?php if($txtImagen != ""){ ?>

                                <img class="img-thumbnail rounded" src="../../imgs/<?php echo $txtImagen;?>" width="50px" height="50px" alt="" srcset="" />

                            <?php }?>

                            <input type="file" class="form-control" name="fileImagen" id="fileImagen" />
                        </div>

                        <br/>

                        <div class="btn-group" role="group" aria-label="">

                            <button type="submit" name="accion" <?php echo ($accion == "Seleccionar")? "disabled": ""; ?> value="Agregar" class="btn btn-success"  actived>Agregar</button>

                            <button type="submit" name="accion" <?php echo ($accion != "Seleccionar")? "disabled": ""; ?> value="Modificar" class="btn btn-warning">Modificar</button>

                            <button type="submit" name="accion" <?php echo ($accion != "Seleccionar")? "disabled": ""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>




    <div class="col-md-7">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($ebookList as $libro) {?>
                <tr>
                    <td><?php echo $libro['id'];?></td>
                    <td><?php echo $libro['nombre'];?></td>
                    <td>

                      <img class="img-thumbnail rounded" src="../../imgs/<?php echo $libro['imagen'];?>" width="150px" height="150px" alt="" srcset="" />

                    </td>

                    <td>
                        <form method="POST">
                            <input type="text" hidden name="txtID" id="txtID" value="<?php echo $libro['id']?>" />

                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>

                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                        </form>

                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>

<?php include_once('../template/pie.php');?>