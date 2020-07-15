<?php
session_start();
include_once("../funciones/funciones.php");
include_once("../funciones/consultas.php");
include_once("../funciones/bd.php");
use funciones\mysqlfunciones;
use consultas_sql\consultas;
$ejecutar = new mysqlfunciones();
$consulta= new consultas();


$id_comprador =$_SESSION["id"];
$allCompras = $consulta->allCompras($id_comprador);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include("../includes/header.php");
  
   ?>

    <title>Document</title>
</head>
<body>
    <?php
   include("../includes/conexion.php")
   
    ?>
  
  <div class="container mt-5">
  <div class="row">
  <div class="col-sm-12">
  <a href="index.php" class="btn btn-danger float-right mb-5">Seguir comprando</a>
  <h1>Tus compras:</h1>
  </div>
  <div class="col-sm-12">
      <div class="table-responsive">
      <table class="table table-stripped">
    <thead>
    <tr>    
    <th> Producto</th>
    <th>Cantidad</th>
    <th> Categoria</th>
    <th>Color</th>
    <th>Precio</th>
    <th >Eliminar compra</th>
    </tr>
    </thead>
    <tbody>
        <?php
    while ($mostrar=mysqli_fetch_array($allCompras)){ //array: nos trae un arreglo de datos por posiciones, //2: arreglo asociativo podemos ver los campos de los bd
        $id_producto = $mostrar["id_producto"];
        $color =$consulta->idColor($id_producto);
        $categoria =$consulta->idCategoria($id_producto);
        ?>
        <tr>
        <th><?php echo$mostrar['descripcion_pr'];?></th>
        <th><?php echo$mostrar['cantidad_compra'];?></th>
        <?php while($qry=mysqli_fetch_array($color)){?>
        <?php while($qry2=mysqli_fetch_array($categoria)){?>    
        <th><?php echo$qry2['nombre_categoria'];?></th>
        <?php }?>
        <th><?php echo$qry['color'];?></th>
        <th><?php echo"$".$qry['precio_pr'];?></th>
    <?php }?>
        <td>
        <a href="eliminar_compra.php?id=<?php echo $mostrar['id_compra']; ?>">Eliminar</a>
    
    </td>
       
        </tr>
        <?php
    }
        ?>
    </tbody>
    </table>
      </div>
  </div>

  </div>
  </div>

  
  <?php include("../includes/script.php")?>
</body>
</html>