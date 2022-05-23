<?php
if($_POST){
   header('Location:inicio.php');
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

                        <form method="POST" action="inicio.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">User:</label>
                                <input type="text" class="form-control" name="user" placeholder="David">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password:</label>
                                <input type="password" class="form-control" name="password" placeholder="You password">
                            </div>
                            <br />
                            <buttom type="submit" class="btn btn-primary">sign</buttom>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
