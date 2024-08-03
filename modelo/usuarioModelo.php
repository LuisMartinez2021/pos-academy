<?php
require_once "conexion.php";

class ModeloUsuario{
    
    /*=========================
     Acceso al Sistema
     ==========================*/
    static public function mdlAccesoUsuario($usuario){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM usuario WHERE login_usuario='$usuario'");
        $stmt->execute();
        
        return $stmt->fetch();
        
        $stmt->close();
        $stmt->null;
    }
    
    static public function mdlInfoUsuarios(){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM usuario");
        $stmt->execute();
        
        return $stmt->fetchAll();
        
        $stmt->close();
        $stmt->null;
    }
    
    static public function mdlRegUsuario($data){
        $loginUsuario=$data["loginUsuario"];
        $password=$data["password"];
        $perfil=$data["perfil"];
        
        $stmt=Conexion::conectar()->prepare("INSERT INTO usuario(login_usuario,password,perfil) 
        VALUES('$loginUsuario','$password','$perfil')");
        
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        
        $stmt->close();
        $stmt->null;
    }

    static public function mdlActualizarAcceso($fechaHora,$id){
        $stmt=Conexion::conectar()->prepare("UPDATE usuario SET ultimo_login='$fechaHora' WHERE id_usuario='$id'");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt->null;
    }

    static public function mdlInfoUsuario($id){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM usuario WHERE id_usuario=$id");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt->null;
    }
    static public function mdlEditUsuario($data){

        $password=$data["password"];
        $perfil=$data["perfil"];
        $estado=$data["estado"];
        $id=$data["id"];

        $stmt=Conexion::conectar()->prepare("UPDATE usuario SET password='$password', perfil='$perfil', estado='$estado' WHERE id_usuario=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt->null;
    }
}