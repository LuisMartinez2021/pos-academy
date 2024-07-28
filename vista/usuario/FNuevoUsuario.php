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
                    <input type="text" class="form-control" name="login" placeholder="Ingrese Usuario">
                </div>
                <div class="form-group">
                    <label for="">Password <code>*</code></label>
                    <input type="password" class="form-control" name="password" placeholder="Ingrese Password">
                </div>
                <div class="form-group">
                    <label for="">Repetir Password <code>*</code></label>
                    <input type="password" class="form-control" name="vrPassword" placeholder="Repita Password">
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
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
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