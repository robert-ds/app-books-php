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
    $query->bindParam(':imagen',$fileImagen);
    $query->execute();
      break;

  case "Modificar":
    echo "Presionando el Botón Modificar";
    break;

  case "Cancelar":
    echo "Presionando el Botón Cancelar";
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
    $SQL = "DELETE FROM `libros` WHERE id=:id ";
    $query = $connect->prepare($SQL);
    $query->bindParam(':id',$txtID);
    $query->execute();
    break;

  default:
      "No Existe la Acción";
}

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
                            <input type="text" class="form-control" value="<?php echo $txtID;?>" name="txtID" id="txtID" placeholder="ID" />
                        </div>

                        <div class="form-group">
                            <label for="txtNombre">Nombre:</label>
                            <input type="text" class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre"  placeholder="Nombre del Libro" />
                        </div>


                        <br/>
                        <div class="form-group">
                            <label for="fileImagen">Imagen:</label>
                            <?php echo $txtImagen;?>
                            <input type="file" class="form-control" name="fileImagen" id="fileImagen" />
                        </div>

                        <br/>

                        <div class="btn-group" role="group" aria-label="">
                            <button type="submit" name="accion" value="Agregar" class="btn btn-success" actived>Agregar</button>
                            <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                            <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
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
                    <td><?php echo $libro['id']?></td>
                    <td><?php echo $libro['nombre']?></td>
                    <td><?php echo $libro['imagen']?></td>
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