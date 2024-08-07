            <form action="" id="FRegUsuario">
             <div class="modal-header bg-primary">
              <h4 class="modal-title">Registro Nuevo Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Login Usuario <code>*</code></label>
                    <input type="text" class="form-control" name="login" id="login" placeholder="Ingrese Usuario">
                </div>
                <div class="form-group">
                    <label for="">Password <code>*</code></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese Password">
                </div>
                <div class="form-group">
                    <label for="">Repetir Password <code>*</code></label>
                    <input type="password" class="form-control" name="vrPassword" id="vrPassword" placeholder="Repita Password">
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
      RegUsuario()
    }
  });
  $('#FRegUsuario').validate({
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