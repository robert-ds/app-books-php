<?php include_once('../template/cabecera.php');?>

<?php

// print_r($_POST);
// print_r($_FILES);

$txtID = (isset($_POST['txtID']))? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre']))? $_POST['txtNombre'] : "";
$fileImagen = (isset($_FILES['fileImagen']['name']))? $_FILES['fileImagen']['name'] : "";
$accion = (isset($_POST['accion']))? $_POST['accion'] : "";

echo $txtID."<br/>".$txtNombre."<br/>".$fileImagen."<br/>".$accion

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
                            <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID" />
                        </div>

                        <div class="form-group">
                            <label for="txtNombre">Nombre:</label>
                            <input type="text" class="form-control" name="txtNombre" id="txtNombre"  placeholder="Nombre del Libro" />
                        </div>

                        <div class="form-group">
                            <label for="fileImagen">Imagen:</label>
                            <input type="file" class="form-control" name="fileImagen" id="fileImagen" />
                        </div>

                        <br/>

                        <div class="btn-group" role="group" aria-label="">
                            <button type="button" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                            <button type="button" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                            <button type="button" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>




    <div class="col-md-5">

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
                <tr>
                    <td>2</td>
                    <td>Aprende php</td>
                    <td>imagan.jpg</td>
                    <td>Selecionar | Borrar</td>
                </tr>

            </tbody>
        </table>

    </div>

<?php include_once('../template/pie.php');?>