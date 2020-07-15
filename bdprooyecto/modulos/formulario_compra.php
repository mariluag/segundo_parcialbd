<?php
include_once("../funciones/funciones.php");
include_once("../funciones/consultas.php");
include_once("../funciones/bd.php");
use funciones\mysqlfunciones;
use consultas_sql\consultas;
$ejecutar = new mysqlfunciones();
$consulta= new consultas();
$session = $ejecutar->usuarioActivo();
$id= $_GET["id"];
$productos = $consulta->idProducto($id);
$colores = $consulta->idColor($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<?php include_once('../includes/header.php')?>

</head>
<body> 
<footer class="footer" id="about">
        <div class="deg-footer"></div>
        <div class="ejeZfooter">
            <div class="footer-container">
                <div class="footer-tittle">
                    <h2>Formulario de compra</h2>
                    <hr>
                </div>
                <?php while ($qry=mysqli_fetch_array($productos)){ ?>         
                <div class="formulario-content">
                    <form action="agregar_compra.php" id="formulario">
                        <label for="user">Producto</label>
                        <input type="hidden" name="id_producto" value="<?php echo $qry["id_producto"]?>">
                        <p class="descripcion" ><?php echo $qry["descripcion_pr"];?></p>

                        <label for="email">Cantidad</label>
                        <select name="cantidad" id="cantidad" class="form-control">
                      <option value = "0">Selecciona una cantidad</option>
                            <?php $numero=1;
                            ?>  
                          <?php do{ ?> 
                           
                      <option value = "<?php echo $numero;?>"><?php echo $numero?></option>
                      <?php $numero++;?>

                       <?php }while($numero<=$qry["stock_pr"]);?>

                       </select>

                        <label for="mensaje">Colores disponibles</label>
                        <select name="color" id="color" class="form-control">
                      <option value = "0">Selecciona un color</option>
                      <?php while ($qry2=mysqli_fetch_array($colores)) {?>
                        <option value ="<?php echo $qry["color_pr"];?>"><?php echo $qry2["color"]?></option>
                     <?php }

                     ?>
                        </select>
                        <br>
              <button class="btn btn-danger float-left " value="Agregar compra">Confirmar compra</button>
                    </form>
                </div>
                <?php
                           }
                           
                           ?>
            
            </div>
        </div>
    </footer>


    <?php include_once('../includes/script.php');?>
</body>
</html>

