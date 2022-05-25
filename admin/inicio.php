<?php include('./template/cabecera.php');?>


      <div class="col-md-12">

        <div class="jumbotron">
          <h1 class="display-3">Bienvenido <?php echo $nombreUsuario ?></h1>
          <p class="lead">Administraremos nuestros libros el sitio web</p>
          <hr class="my-2">
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="../admin/sections/libros.php" role="button">administrar libros</a>
          </p>
        </div>

      </div>


<?php include('./template/pie.php');?>