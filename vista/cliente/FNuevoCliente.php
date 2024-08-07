            <form action="" id="FRegCliente">
             <div class="modal-header bg-primary">
              <h4 class="modal-title">Registro Nuevo Cliente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Razon Social <code>*</code></label>
                            <input type="text" class="form-control" name="rscliente" id="rscliente">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">NIT/CI <code>*</code></label>
                            <input type="text" class="form-control" name="nitCI" id="nitCI">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nombre <code>*</code></label>
                            <input type="text" class="form-control" name="nomCliente" id="nomCliente">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Dirección </label>
                            <input type="text" class="form-control" name="dirCliente" id="dirCliente">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Teléfono </label>
                            <input type="text" class="form-control" name="telCliente" id="telCliente">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">E-mail <code>*</code></label>
                            <input type="email" class="form-control" name="emailCliente" id="emailCliente">
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
      RegCliente()
    }
  });
  $('#FRegCliente').validate({
    rules: {
        rscliente: {
        required: true,
        minlength: 5
      },
        nitCI: {
        required: true,
        minlength: 5
      },
        nomCliente: {
        required: true,
        minlength: 3
      },
        emailCliente: {
            required: true,
            email: true
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