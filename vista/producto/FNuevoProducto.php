            <form action="" id="FRegProducto" enctype="multipart/form-data">
             <div class="modal-header bg-primary">
              <h4 class="modal-title">Registro Nuevo Producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Cod. Producto <code>*</code></label>
                            <input type="text" class="form-control" name="codProducto" id="codProducto">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Cod. Producto SIN <code>*</code></label>
                            <input type="text" class="form-control" name="codProductoSIN" id="codProductoSIN">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Descripción <code>*</code></label>
                            <input type="text" class="form-control" name="desProdcuto" id="desProdcuto">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Precio <code>*</code></label>
                            <input type="text" class="form-control" name="preProducto" id="preProducto">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Unidad de medida <code>*</code></label>
                            <input type="text" class="form-control" name="login" id="login">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Unidad de medida SIN <code>*</code></label>
                            <input type="text" class="form-control" name="login" id="login">
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
                                    <label class="custom-file-label" for="imgProducto">Elegir archivo</label>
                                </div>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-info btn-flat"><i class="fas fa-upload"></i><span> Subir</span></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group text-center">
                            <img src="assets/dist/img/product_default.png" alt="" width="150" class="img-thumbnail previsualizar">
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
      RegProducto()
    }
  });
  $('#FRegProducto').validate({
    rules: {
        codProducto: {
        required: true,
        minlength: 3
      },
        codProductoSIN: {
        required: true,
        minlength: 3
      },
        desProdcuto: {
        required: true,
        minlength: 3
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