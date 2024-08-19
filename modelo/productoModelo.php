<?php
require_once "conexion.php";

class ModeloProducto{
    
    /*=========================
     Acceso al Sistema
     ==========================*/
    static public function mdlAccesoProducto($producto){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM producto WHERE login_producto='$producto'");
        $stmt->execute();
        
        return $stmt->fetch();
        
        $stmt->close();
        $stmt->null;
    }

    static public function mdlInfoProductos(){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM producto");
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt->null;
    }

    static public function mdlInfoProducto($id){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM producto WHERE id_producto=$id");
        $stmt->execute();
        
        return $stmt->fetch();
        
        $stmt->close();
        $stmt->null;
    }
    
    static public function mdlRegProducto($data){
        $codProducto=$data["codProducto"];
        $codProductoSIN=$data["codProductoSIN"];
        $desProducto=$data["desProducto"];
        $preProducto=$data["preProducto"];
        $unidadMedida=$data["unidadMedida"];
        $unidadMedidaSIN=$data["unidadMedidaSIN"];
        $imgProducto=$data["imgProducto"];
        
        $stmt=Conexion::conectar()->prepare("INSERT INTO producto(cod_producto,cod_producto_sin,nombre_producto,precio_producto,unidad_medida,unidad_medida_sin,imagen_producto) 
        VALUES('$codProducto','$codProductoSIN','$desProducto','$preProducto','$unidadMedida','$unidadMedidaSIN','$imgProducto')");
        
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        
        $stmt->close();
        $stmt->null;
    }

    static public function mdlActualizarAcceso($fechaHora,$id){
        $stmt=Conexion::conectar()->prepare("UPDATE producto SET ultimo_login='$fechaHora' WHERE id_producto='$id'");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt->null;
    }

    static public function mdlEditProducto($data){

        $idProducto=$data["idProducto"];
        $codProductoSIN=$data["codProductoSIN"];
        $desProducto=$data["desProducto"];
        $preProducto=$data["preProducto"];
        $unidadMedida=$data["unidadMedida"];
        $unidadMedidaSIN=$data["unidadMedidaSIN"];
        $estado=$data["estado"];
        $imgProducto=$data["imgProducto"];

        $stmt=Conexion::conectar()->prepare("UPDATE producto SET cod_producto_sin='$codProductoSIN',nombre_producto='$desProducto',precio_producto='$preProducto',unidad_medida='$unidadMedida',unidad_medida_sin='$unidadMedidaSIN',disponible='$estado',imagen_producto='$imgProducto' WHERE id_producto='$idProducto'");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt->null;
    }

    static public function mdlEliProducto($id){

        $stmt=Conexion::conectar()->prepare("DELETE FROM producto WHERE id_producto=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt->null;
    }
}