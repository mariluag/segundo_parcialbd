<?php

namespace funciones;

//define('url', "http://".$_SERVER['HTTP_HOST']."/proyectodb/");
class mysqlfunciones{
    
    public function ejecutar($qry){
       $connection= $this->conexion();
       $resultado = mysqli_query($connection, $qry);
       $registro = mysqli_insert_id($connection);
       return $resultado;


    }
    public function conexion(){
        $connection = new \mysqli(HOST, USUARIO, PASSWORD, BD);
        return $connection;
    }

    public function usuarioExiste($usuario, $password){
    $connection= $this->conexion();
    $consulta = "SELECT * FROM usuarios WHERE correo_usr = '$usuario'";
    $resultado = mysqli_query($connection, $consulta);
    $fila = mysqli_fetch_array($resultado);
    $respuesta = '';
    if (sizeof($fila) > 0) {
        if ($fila["password_usr"] == $password) {
            session_start();
            $_SESSION["login"]= true;
            $_SESSION["id"] = $fila["id_usr"];
            $_SESSION["nombre"] = $fila["nombre_usr"];
            $_SESSION["apellido"] = $fila["apellido_usr"];
            $respuesta = 1;
        } else {
            $respuesta = 'La contraseña no coincide con el usuario';
        }
    } else {
        $respuesta = 'Usuario no encontrado' . $consulta;
    }
    return $respuesta;
       
}

public function usuarioActivo(){
    session_start();
 if( $_SESSION['login']) {
  // echo "si estoy logueado";
   
 
 }else{
   echo "No estoy logueado";
  header('Location: ../index.php');
 }
    
}


}
?>