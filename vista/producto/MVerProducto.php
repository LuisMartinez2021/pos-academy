<?php
require_once "../../controlador/productoControlador.php";
require_once "../../modelo/productoModelo.php";

$id=$_GET["id"];

$producto=ControladorProducto::ctrInfoProducto($id);

?>
<div class="modal-header bg-info">
    <h4 class="modal-title">Información de Producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <th>Cod. Producto:</th>
                    <td><?php echo $producto["cod_producto"];?></td>
                </tr>
                <tr>
                    <th>Cod. Producto SIN:</th>
                    <td><?php echo $producto["cod_producto_sin"];?></td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td><?php echo $producto["nombre_producto"];?></td>
                </tr>
                <tr>
                    <th>Precio:</th>
                    <td><?php echo $producto["precio_producto"];?></td>
                </tr>
                <tr>
                    <th>Unidad de Medida:</th>
                    <td><?php echo $producto["unidad_medida"];?></td>
                </tr>
                <tr>
                    <th>Unidad de Medida SIN:</th>
                    <td><?php echo $producto["unidad_medida_sin"];?></td>
                </tr>
                <tr>
                    <th>Estado:</th>
                    <td><?php
                        if($producto["disponible"]==1){
                            ?>
                            <span class="badge badge-success">Disponible</span>
                            <?php
                        }else{
                            ?>
                            <span class="badge badge-danger">No disponible</span>
                            <?php
                        }
                        ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6" style="text-align: center">
            <?php
            if($producto["imagen_producto"]==""){
                ?>
                <img src="assets/dist/img/product_default.png" alt="" width="300" class="img-thumbnail previsualizar">
                <?php
            }else{
                ?>
                <img src="assets/dist/img/productos/<?php echo $producto["imagen_producto"]; ?>" alt="" width="300" class="img-thumbnail previsualizar">
                <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>