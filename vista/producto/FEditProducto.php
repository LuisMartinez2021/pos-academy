<?php
require_once "../../controlador/productoControlador.php";
require_once "../../modelo/productoModelo.php";

$id=$_GET["id"];

$producto=ControladorProducto::ctrInfoProducto($id);

?>

<form action="" id="FEditProducto" enctype="multipart/form-data">
    <div class="modal-header bg-secondary">
        <h4 class="modal-title">Editar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Cod. Producto <code>*</code></label>
                    <input type="text" class="form-control" name="codProducto" id="codProducto" readonly value="<?php echo $producto["cod_producto"];?>">
                    <input type="hidden" name="idProducto" value="<?php echo $producto["id_producto"];?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Cod. Producto SIN <code>*</code></label>
                    <input type="text" class="form-control" name="codProductoSIN" id="codProductoSIN" value="<?php echo $producto["cod_producto_sin"];?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Descripción <code>*</code></label>
                    <input type="text" class="form-control" name="desProducto" id="desProducto" value="<?php echo $producto["nombre_producto"];?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Precio <code>*</code></label>
                    <input type="text" class="form-control" name="preProducto" id="preProducto" value="<?php echo $producto["precio_producto"];?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Unidad de medida <code>*</code></label>
                    <input type="text" class="form-control" name="unidadMedida" id="unidadMedida" value="<?php echo $producto["unidad_medida"];?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Unidad de medida SIN <code>*</code></label>
                    <input type="text" class="form-control" name="unidadMedidaSIN" id="unidadMedidaSIN" value="<?php echo $producto["unidad_medida_sin"];?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputFile">Imagen <span class="text-muted">(Peso maximo 10MB - JPG, PNG)</span></label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imgProducto" name="imgProducto" onchange="previsualizar()">
                            <input type="hidden" name="imgActual" value="<?php $producto["imagen_producto"];?>">
                            <label class="custom-file-label" for="imgProducto">Elegir archivo</label>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-info btn-flat"><i class="fas fa-upload"></i><span> Subir</span></button>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Estado</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="estadoActivo" name="estado" value="1" <?php if ($producto["disponible"]=="1"):?>checked<?php endif;?>>
                                    <label for="estadoActivo">Disponible</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="estadoInactivo" name="estado" value="0" <?php if ($producto["disponible"]=="0"):?>checked<?php endif;?>>
                                    <label for="estadoInactivo">No disponible</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group text-center">
                    <?php
                    if($producto["imagen_producto"]==""){
                        ?>
                        <img src="assets/dist/img/product_default.png" alt="" width="150" class="img-thumbnail previsualizar">
                        <?php
                    }else{
                        ?>
                        <img src="assets/dist/img/productos/<?php echo $producto["imagen_producto"]; ?>" alt="" width="150" class="img-thumbnail previsualizar">
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
                editProducto()
            }
        });
        $('#FEditProducto').validate({
            rules: {
                codProductoSIN: {
                    required: true,
                    minlength: 3
                },
                desProducto: {
                    required: true,
                    minlength: 3
                },
                preProducto: {
                    required: true,
                    minlength: 1,
                    number: true
                },
                unidadMedida: {
                    required: true,
                    minlength: 1
                },
                unidadMedidaSIN: {
                    required: true,
                    minlength: 1,
                    number: true
                },
            },

            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>