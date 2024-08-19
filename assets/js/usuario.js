function MNuevoUsuario(){
    $("#modal-default").modal("show")
    
    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/usuario/FNuevoUsuario.php",
        data: obj,
        success: function(data){
            $("#content-default").html(data)
        }
    })
    
}

function RegUsuario(){
    var formData= new FormData($("#FRegUsuario")[0])//Extrae informacion del formulario usuario
    
    if(formData.get("password")==formData.get("vrPassword")){
       $.ajax({
        type:"POST",
        url:"controlador/usuarioControlador.php?ctrRegUsuario",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            
            if(data="ok"){
                
                Swal.fire({
                  title: "El Usuario ha sido registrado",
                  icon:"success",
                  showConfirmButton: false,
                  timer: 1000
                })
                
                setTimeout(function(){
                    location.reload()
                },1200)
                
            }else{
                
                Swal.fire({
                  title: "Error!",
                  icon:"error",
                  showConfirmButton: false,
                  timer: 1000
                })
            }
            
        }
    }) 
    }
}

function MEditUsuario(id) {
    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/usuario/FEditUsuario.php?id="+id,
        data: obj,
        success: function(data){
            $("#content-default").html(data)
        }
    })
}

function editUsuario(id) {
    var formData= new FormData($("#FEditUsuario")[0])//Extrae informacion del formulario usuario

    if(formData.get("password")==formData.get("vrPassword")){
        $.ajax({
            type:"POST",
            url:"controlador/usuarioControlador.php?ctrEditUsuario",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data="ok"){

                    Swal.fire({
                        title: "El Usuario ha sido actualizado",
                        icon:"success",
                        showConfirmButton: false,
                        timer: 1000
                    })

                    setTimeout(function(){
                        location.reload()
                    },1200)

                }else{

                    Swal.fire({
                        title: "Error!",
                        icon:"error",
                        showConfirmButton: false,
                        timer: 1000
                    })
                }

            }
        })
    }
}

function MEliUsuario(id) {
    var obj={
        id:id
    }

    Swal.fire({
        title:"Estas seguro de eliminar este usuario?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Confirmar",
        denyButtonText: "Cancelar"
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                type:"POST",
                url:"controlador/usuarioControlador.php?ctrEliUsuario",
                data: obj,
                success: function(data){
                    console.log(data)
                    if(data="ok"){
                        location.reload()
                    }else{
                        Swal.fire({
                            title: "Error",
                            text: "El usuario no puede ser eliminado",
                            icon:"error",
                            showConfirmButton: false,
                            timer: 1000
                        })
                    }
                }
            })
        }
    })
}