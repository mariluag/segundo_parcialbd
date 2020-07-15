<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<?php include_once('includes/header.php')?>

</head>
<body>
    
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-6 back-img">
    </div>
    <div class="col-md-6">
    <div class="cd back-login">
        <div class="card-body">
        <form action="validar_usr.php" method="POST" name="login">
            <div class="titulo">
                <h1>¡Bienvenido!</h1>
                <h2>Ingresa con tu usuario</h2>
            </div>
            <div class="form-group">
            <label for="pwd">Usuario:</label>
            <input type="text" class="form-control" name="usuario" id="usuario">
            </div>
        <div class="form-group">
        <label for="pwd">Contraseña:</label>
          <input type="password" class="form-control" name="password" id="password">
          </div>
            <button type="submit" id="btn" class="btn btn-login" value="login">Ingresar</button>
              </form>
            </div>
            </div>
    </div>
    </div>
    </div>


    <?php include_once('includes/script.php');?>
</body>
</html>

