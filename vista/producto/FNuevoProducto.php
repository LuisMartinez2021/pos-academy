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
                            <input type="text" class="form-control" name="login" id="login" placeholder="Ingrese Producto">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Cod. Producto SIN <code>*</code></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Descripción <code>*</code></label>
                            <input type="password" class="form-control" name="vrPassword" id="vrPassword" placeholder="Repita Password">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Precio <code>*</code></label>
                            <input type="text" class="form-control" name="login" id="login" placeholder="Ingrese Producto">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Unidad de medida <code>*</code></label>
                            <input type="text" class="form-control" name="login" id="login" placeholder="Ingrese Producto">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Unidad de medida SIN <code>*</code></label>
                            <input type="text" class="form-control" name="login" id="login" placeholder="Ingrese Producto">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Imagen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Elegir archivo</label>
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
      login: {
        required: true,
        minlength: 3
      },
      password: {
        required: true,
        minlength: 3
      },
      vrPassword: {
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