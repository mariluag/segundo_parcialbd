<?php
session_start();
include_once("../funciones/funciones.php");
include_once("../funciones/bd.php");
include_once("../funciones/consultas.php");
use funciones\mysqlfunciones;
use consultas_sql\consultas;
$ejecutar = new mysqlfunciones();
$consulta = new consultas();
$id = $_GET["id"];


$qry= "DELETE FROM compras WHERE id_compra = $id";
$ejecucion = $ejecutar->ejecutar($qry);


header("Location: all_compras.php");
?>