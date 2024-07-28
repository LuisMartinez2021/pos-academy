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
}