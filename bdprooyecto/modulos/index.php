<?php
session_start();
include_once("../funciones/funciones.php");
include_once("../funciones/consultas.php");
include_once("../funciones/bd.php");
use consultas_sql\consultas;
use funciones\mysqlfunciones;
$ejecutar = new mysqlfunciones();
$consulta= new consultas();
$productos = $consulta->productos();



?>
<!DOCTYPE html>
<html lang="es">

<head>
<?php include_once('../includes/header.php')?>
</head>

<body>

    <!--Menú de navegación-->
    <header id="header">
        <nav class="menu">
            <div class="logo-box">
                <h1><a href="#">MG</a></h1>
                <spam class="btn-menu"><i class="fas fa-bars"></i></spam>
            </div>
            <div class="list-container">
                <ul class="lists">
                    <li><a href="../cerrar_sesion.php" class="activo">Cerrar sesión</a></li>
                  
                </ul>
            </div>
        </nav>
        <!--Img Header-->
        <div class="img-header">
            <div class="welcome">
                <h2>Bienvenido <?php echo $_SESSION["nombre"]." ". $_SESSION["apellido"]?></h2>
                <hr>
                <p>Crea tus mejores outfit</p>
             <a href="#productos"> 
                 <button  id="abajo" class="btn btn-danger">Ver productos</button>
                </a>
            </div>
        </div>
    </header>
    <!--Termina menú de navegación-->
    <!--Acerca de -->
    <main>
        <!--sirve para poner el contenido principal-->
        <section class="acerde" id="productos">
            <div class="container">
                <h2>Nuestros productos</h2>
                <div class="about-gallery">
                <div class="container">
        <div class="col-md-12">
            <div class="row">
                <?php
    while ($mostrar=mysqli_fetch_array($productos)){ //array: nos trae un arreglo de datos por posiciones, //2: arreglo asociativo podemos ver los campos de los bd
        ?>
                <div class="col-md-4">
                    <?php
                    $ruta_img = $mostrar["img_pr"];
                    ?>
                    <img src="../img/productos/<?php echo $ruta_img; ?>" alt="">
                    <div class="testimonio-text">
                        <p><?php echo $mostrar["descripcion_pr"]?></p>
                        <p>MX$<?php echo $mostrar["precio_pr"]?></p>
                        <?php  $id_pr = $mostrar["id_producto"];  
                        $color = $consulta->idColor($id_pr);
                        ?>
               <?php while ($mst=mysqli_fetch_array($color)) {?>
                  <p>Disponible en: <?php echo $mst["color"]?></p>
            <?php   }?>
           
            <a href="formulario_compra.php?id=<?php echo $id_pr?>" class="btn btn-light float-left mb-5">Agregar compra</a>
    
                    </div>
                    </div>
                  
                    <?php
    }
                    ?>
  </div>
                    </div>
                    </div>
                </div>
                <div class="about-more ">
                    <a href="all_compras.php"> <input type="submit" class="btn btn-danger" value="Ir a tus compras" ></input></a>
                   </div>
                <br>
            </div>
        </section>
        
       
    </main>

   

    <!--Script-->
    <?php include_once('../includes/script.php');?>
</body>


</html>