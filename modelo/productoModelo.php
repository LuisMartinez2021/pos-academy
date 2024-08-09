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
    
    static public function mdlRegProducto($data){
        $loginProducto=$data["loginProducto"];
        $password=$data["password"];
        $perfil=$data["perfil"];
        
        $stmt=Conexion::conectar()->prepare("INSERT INTO producto(login_producto,password,perfil) 
        VALUES('$loginProducto','$password','$perfil')");
        
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

    static public function mdlInfoProducto($id){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM producto WHERE id_producto=$id");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt->null;
    }
    static public function mdlEditProducto($data){

        $password=$data["password"];
        $perfil=$data["perfil"];
        $estado=$data["estado"];
        $id=$data["id"];

        $stmt=Conexion::conectar()->prepare("UPDATE producto SET password='$password', perfil='$perfil', estado='$estado' WHERE id_producto=$id");

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