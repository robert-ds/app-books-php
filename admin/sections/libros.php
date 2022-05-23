<?php include_once('../template/cabecera.php');?>

    <div class="col-md-5">

        <div class="card">
            <div class="card-header">
                Datos de Libros
            </div>

                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="txtID">ID:</label>
                            <input type="text" class="form-control" name="txtID" placeholder="ID" />
                        </div>

                        <div class="form-group">
                            <label for="txtNombre">Nombre:</label>
                            <input type="text" class="form-control" name="txtNombre" placeholder="Nombre del Libro" />
                        </div>

                        <div class="form-group">
                            <label for="file">Imagen:</label>
                            <input type="file" class="form-control" name="file" placeholder="Inserte la Imagen" />
                        </div>

                        <br/>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-success">Agregar</button>
                            <button type="button" class="btn btn-warning">Modificar</button>
                            <button type="button" class="btn btn-info">Cancelar</button>
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