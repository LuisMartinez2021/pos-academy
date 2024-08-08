<?php
require_once "conexion.php";

class ModeloCliente{

    static public function mdlInfoClientes(){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM cliente");
        $stmt->execute();
        
        return $stmt->fetchAll();
        
        $stmt->close();
        $stmt->null;
    }
    
    static public function mdlRegCliente($data){
        $rscliente=$data["rscliente"];
        $nitCI=$data["nitCI"];
        $nomCliente=$data["nomCliente"];
        $dirCliente=$data["dirCliente"];
        $telCliente=$data["telCliente"];
        $emailCliente=$data["emailCliente"];
        
        $stmt=Conexion::conectar()->prepare("INSERT INTO cliente(razon_social_cliente, nit_ci_cliente, direccion_cliente, nombre_cliente, telefono_cliente, email_cliente) 
        VALUES('$rscliente','$nitCI','$dirCliente','$nomCliente','$telCliente','$emailCliente')");
        
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        
        $stmt->close();
        $stmt->null;
    }

    static public function mdlActualizarAcceso($fechaHora,$id){
        $stmt=Conexion::conectar()->prepare("UPDATE Cliente SET ultimo_login='$fechaHora' WHERE id_Cliente='$id'");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt->null;
    }

    static public function mdlInfoCliente($id){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM Cliente WHERE id_Cliente=$id");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt->null;
    }
    static public function mdlEditCliente($data){

        $password=$data["password"];
        $perfil=$data["perfil"];
        $estado=$data["estado"];
        $id=$data["id"];

        $stmt=Conexion::conectar()->prepare("UPDATE Cliente SET password='$password', perfil='$perfil', estado='$estado' WHERE id_Cliente=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt->null;
    }

    static public function mdlEliCliente($id){

        $stmt=Conexion::conectar()->prepare("DELETE FROM Cliente WHERE id_Cliente=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt->null;
    }
}