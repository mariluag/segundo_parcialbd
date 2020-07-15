<?php
session_start();
include_once("../funciones/funciones.php");
include_once("../funciones/bd.php");
include_once("../funciones/consultas.php");

use consultas_sql\consultas;
use funciones\mysqlfunciones;
$ejecutar = new mysqlfunciones();
$consulta = new consultas();
$id_producto =$_REQUEST["id_producto"];
$cantidad = $_REQUEST["cantidad"];
$color = $_REQUEST["color"];
$log_id=$_SESSION["id"];
$log_name=$_SESSION["nombre"];



//$delete = $consulta->deleteStock($id_producto);


$qry="INSERT INTO compras(id_comprador, nombre_comprador, producto_compra, cantidad_compra, color_compra)
VALUES ('$log_id', '$log_name','$id_producto','$cantidad', '$color')";
$ejecucion = $ejecutar->ejecutar($qry);


header("Location: index.php");
?>