<?php
    include_once("funciones/funciones.php");
    include_once("funciones/bd.php");
    use funciones\mysqlfunciones;
    $ejecutar = new mysqlfunciones();
    
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $respuesta = '';
  

    if($usuario  == '' && empty($password)){
        $respuesta = 'Los valores no deben ser vacios';
        header('Location: index.php?data='. $respuesta);
    }else{
        $respuesta = $ejecutar-> usuarioExiste($usuario,$password);
        if($respuesta == 1){
            header('Location: modulos/index.php');
            
           
           // $log_usuario= $_SESSION["id"];
   
           // $qry="INSERT INTO log_usuario(id_usuario, fuente_log, mensaje_log)
           // VALUES ('$log_usuario', 'usuarios', CONCAT('El usuario:', ' $log_usuario', ' ha iniciado sesion'))";
           // $ejecucion = $ejecutar->ejecutar($qry);
          
        }
        else{
            header('Location: index.php?data='. $respuesta);
        }
    }

   
?>
    