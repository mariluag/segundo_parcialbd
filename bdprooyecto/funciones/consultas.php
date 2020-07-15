<?php

namespace consultas_sql;
use funciones\mysqlfunciones;
 class consultas{

public function productos(){
    $qry = 'SELECT * FROM productos';
    $rt = new mysqlfunciones;
    $res = $rt->ejecutar($qry);
    return $res;
    

}
public function idProducto($id){
    $qry = 'SELECT * FROM productos
    WHERE id_producto='.$id;
    $rt = new mysqlfunciones;
    $res = $rt->ejecutar($qry);
    return $res;
    
}
public function idColor($id){
    $qry="select s.*, c.color 
    from productos s 
    inner join colores c on c.id_color = s.color_pr
	where id_producto =$id";
    $base = new mysqlfunciones();
    $res = $base->ejecutar($qry);
    return $res; 
}
public function idCategoria($id){
    $qry="select s.*, c.nombre_categoria 
    from productos s 
    inner join categorias c on c.id_categoria = s.categoria_pr
	where id_producto =$id";
    $base = new mysqlfunciones();
    $res = $base->ejecutar($qry);
    return $res; 
}

public function allCompras($id){
    $qry="select s.*, c.*
    from productos s 
    inner join compras c on c.producto_compra = s.id_producto
	where id_comprador =$id";
    $base = new mysqlfunciones();
    $res = $base->ejecutar($qry);
    return $res; 
}



public function getColor($id){
    $qry="select s.id_producto, c.color 
    from productos s 
    inner join colores c on c.id_color = s.color_pr
	where id_producto =$id";
    $base = new mysqlfunciones();
    $res = $base->ejecutar($qry);
    return $res; 
}




 }


?>