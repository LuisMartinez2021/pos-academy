<?php
$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
    if($ruta["query"]=="ctrRegUsuario"){
        $metodo=$ruta["query"];
        $usuario=new ControladorUsuario();
        $usuario->$metodo();
    }
}

class ControladorUsuario{
    
    static public function ctrIngresoUsuario(){
        
        if(isset($_POST["usuario"])){
            
            $usuario=$_POST["usuario"];
            $password=$_POST["password"];
            
            $resultado=ModeloUsuario::mdlAccesoUsuario($usuario);
            
            if($resultado["login_usuario"]==$usuario && password_verify($password,$resultado["password"]) && $resultado["estado"]==1){

                $_SESSION["ingreso"]=$resultado["login_usuario"];
                $_SESSION["ingreso"]=$resultado["perfil"];
                $_SESSION["ingreso"]=$resultado["id_usuario"];
                $_SESSION["ingreso"]="ok";

                date_default_timezone_set("America/La_Paz");
                $fecha=date("Y-m-d");
                $hora=date("H-i-s");

                $fechaHora=$fecha." ".$hora;
                $id=$resultado["id_usuario"];

                $ultimoLogin=ModeloUsuario::mdlActualizarAcceso($fechaHora,$id);

                if($ultimoLogin=="ok"){
                    echo '<script>
                        window.location="inicio";
                    </script>';
                }


            }
        }
        
        
    }
    
    static public function ctrInfoUsuarios(){
        $respuesta=ModeloUsuario::mdlInfoUsuarios();
        return $respuesta;
    }
    
    static public function ctrRegUsuario(){
        require "../modelo/usuarioModelo.php";
        
        $password=password_hash($_POST["password"],PASSWORD_DEFAULT);
        
        $data=array(
            "loginUsuario"=>$_POST["login"],
            "password"=>$password,
            "perfil"=>"Moderador"
        );
        
        $respuesta=ModeloUsuario::mdlRegUsuario($data);
        
        echo $respuesta;
        
    }

    static public function ctrInfoUsuario($id){
        $respuesta=ModeloUsuario::mdlInfoUsuario($id);
        return $respuesta;
    }
}