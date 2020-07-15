<?php
include_once("funciones/funciones.php");
include_once("funciones/bd.php");
use funciones\mysqlfunciones;
$ejecutar = new mysqlfunciones();
session_start();
session_destroy();
header('Location: index.php');

//$log_usuario= $_SESSION["id"];
//$qry="INSERT INTO log_usuario(id_usuario, fuente_log, mensaje_log)
//VALUES ('$log_usuario', 'usuarios', CONCAT('El usuario:', ' $log_usuario', ' ha cerrado sesion'))";
//$ejecucion = $ejecutar->ejecutar($qry);