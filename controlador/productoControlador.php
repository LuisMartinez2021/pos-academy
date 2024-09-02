<?php
$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
    if($ruta["query"]=="ctrRegProducto" ||
      $ruta["query"]=="ctrEditProducto" ||
      $ruta["query"]=="ctrEliProducto"){
        $metodo=$ruta["query"];
        $producto=new ControladorProducto();
        $producto->$metodo();
    }
}

class ControladorProducto{
    
    static public function ctrIngresoProducto(){
        
        if(isset($_POST["producto"])){
            
            $producto=$_POST["producto"];
            $password=$_POST["password"];
            
            $resultado=ModeloProducto::mdlAccesoProducto($producto);
            
            if($resultado["login_producto"]==$producto && password_verify($password,$resultado["password"]) && $resultado["estado"]==1){

                $_SESSION["ingreso"]=$resultado["login_producto"];
                $_SESSION["ingreso"]=$resultado["perfil"];
                $_SESSION["ingreso"]=$resultado["id_producto"];
                $_SESSION["ingreso"]="ok";

                date_default_timezone_set("America/La_Paz");
                $fecha=date("Y-m-d");
                $hora=date("H-i-s");

                $fechaHora=$fecha." ".$hora;
                $id=$resultado["id_producto"];

                $ultimoLogin=ModeloProducto::mdlActualizarAcceso($fechaHora,$id);

                if($ultimoLogin=="ok"){
                    echo '<script>
                        window.location="inicio";
                    </script>';
                }


            }
        }
        
        
    }
    
    static public function ctrInfoProductos(){
        $respuesta=ModeloProducto::mdlInfoProductos();
        return $respuesta;
    }
    
    static public function ctrRegProducto(){
        require "../modelo/productoModelo.php";

        $image=$_FILES["imgProducto"];
        $imgNombre=$image["name"];
        $imgTmp=$image["tmp_name"];

        move_uploaded_file($imgTmp,"../assets/dist/img/productos/".$imgNombre);
        $data=array(
            "codProducto"=>$_POST["codProducto"],
            "codProductoSIN"=>$_POST["codProductoSIN"],
            "desProducto"=>$_POST["desProducto"],
            "preProducto"=>$_POST["preProducto"],
            "unidadMedida"=>$_POST["unidadMedida"],
            "unidadMedidaSIN"=>$_POST["unidadMedidaSIN"],
            "imgProducto"=>$imgNombre
        );
        
        $respuesta=ModeloProducto::mdlRegProducto($data);
        
        echo $respuesta;
        
    }

    static public function ctrInfoProducto($id){
        $respuesta=ModeloProducto::mdlInfoProducto($id);
        return $respuesta;
    }

    static public function ctrEditProducto(){
        require "../modelo/productoModelo.php";

        $image=$_FILES["imgProducto"];

        if($image["name"]==""){
            $imgNombre=$_POST["imgActual"];
        }else{
            $imgNombre=$image["name"];
            $imgTmp=$image["tmp_name"];
            move_uploaded_file($imgTmp,"../assets/dist/img/productos/".$imgNombre);
        }

        $data=array(
            "idProducto"=>$_POST["idProducto"],
            "codProductoSIN"=>$_POST["codProductoSIN"],
            "desProducto"=>$_POST["desProducto"],
            "preProducto"=>$_POST["preProducto"],
            "unidadMedida"=>$_POST["unidadMedida"],
            "unidadMedidaSIN"=>$_POST["unidadMedidaSIN"],
            "estado"=>$_POST["estado"],
            "imgProducto"=>$imgNombre
        );

        $respuesta=ModeloProducto::mdlEditProducto($data);

        echo $respuesta;

    }

    static public function ctrEliProducto(){
        require "../modelo/productoModelo.php";

        $id=$_POST["id"];
        $respuesta=ModeloProducto::mdlEliProducto($id);
        echo $respuesta;
    }
}