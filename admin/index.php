
<?php

session_start();

if($_POST){
    if( ( $_POST['user'] == "dev") && ($_POST['password'] == "12345678") ){

      $_SESSION['user'] == "ok";
      $_SESSION["user"] = "dev";

      header("Location:./inicio.php");
    }else{
        $mensaje = "Error: EL usuario o contraseña son incorrectos";
    }

}
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Site Admin</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body>

    <div class="container">
        <div class="row">

            <div class="col-md-4"></div>

            <div class="col-md-4">

                <br/><br/><br/>

                <div class="card">
                    <div class="card-header">
                        Loggin
                    </div>
                    <div class="card-body">

                        <?php if(isset($mensaje)){  ?>
                        <div class="alert alert-danger" role="alert">
                                <?php echo $mensaje; ?>
                        </div>
                        <?php } ?>

                        <form method="POST">
                            <div class="form-group">
                                <label for="exampleInputUser">User:</label>
                                <input type="text" class="form-control" name="user" placeholder="David">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password:</label>
                                <input type="password" class="form-control" name="password" placeholder="You password">
                            </div>
                            <br />
                            <button type="submit" class="btn btn-primary">sign</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
