<?php
$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
    if($ruta["query"]=="ctrRegCliente" ||
      $ruta["query"]=="ctrEditCliente" ||
      $ruta["query"]=="ctrEliCliente"){
        $metodo=$ruta["query"];
        $Cliente=new ControladorCliente();
        $Cliente->$metodo();
    }
}

class ControladorCliente{

    static public function ctrInfoClientes(){
        $respuesta=ModeloCliente::mdlInfoClientes();
        return $respuesta;
    }
    
    static public function ctrRegCliente(){
        require "../modelo/clienteModelo.php";
        
        $data=array(
            "rscliente"=>$_POST["rscliente"],
            "nitCI"=>$_POST["nitCI"],
            "nomCliente"=>$_POST["nomCliente"],
            "dirCliente"=>$_POST["dirCliente"],
            "telCliente"=>$_POST["telCliente"],
            "emailCliente"=>$_POST["emailCliente"]
        );
        
        $respuesta=ModeloCliente::mdlRegCliente($data);
        
        echo $respuesta;
        
    }

    static public function ctrInfoCliente($id){
        $respuesta=ModeloCliente::mdlInfoCliente($id);
        return $respuesta;
    }

    static public function ctrEditCliente(){
        require "../modelo/ClienteModelo.php";

        if($_POST["password"]==$_POST["passActual"]){
            $password=$_POST["password"];
        }else{
            $password=password_hash($_POST["password"],PASSWORD_DEFAULT);
        }

        $data=array(
            "password"=>$password,
            "id"=>$_POST["idCliente"],
            "perfil"=>$_POST["perfil"],
            "estado"=>$_POST["estado"]
        );

        $respuesta=ModeloCliente::mdlEditCliente($data);

        echo $respuesta;

    }

    static public function ctrEliCliente(){
        require "../modelo/ClienteModelo.php";

        $id=$_POST["id"];
        $respuesta=ModeloCliente::mdlEliCliente($id);
        echo $respuesta;
    }
}