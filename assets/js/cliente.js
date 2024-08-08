function MNuevoCliente(){
    $("#modal-lg").modal("show")
    
    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/cliente/FNuevoCliente.php",
        data: obj,
        success: function(data){
            $("#content-lg").html(data)
        }
    })
    
}

function RegCliente(){
    var formData= new FormData($("#FRegCliente")[0])//Extrae informacion del formulario Cliente

       $.ajax({
        type:"POST",
        url:"controlador/clienteControlador.php?ctrRegCliente",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            console.log(data)
            if(data="ok"){
                
                Swal.fire({
                  title: "El Cliente ha sido registrado",
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

function MEditCliente(id) {
    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/Cliente/FEditCliente.php?id="+id,
        data: obj,
        success: function(data){
            $("#content-default").html(data)
        }
    })
}

function editCliente(id) {
    var formData= new FormData($("#FEditCliente")[0])//Extrae informacion del formulario Cliente

    if(formData.get("password")==formData.get("vrPassword")){
        $.ajax({
            type:"POST",
            url:"controlador/ClienteControlador.php?ctrEditCliente",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
            console.log(data)
                if(data="ok"){

                    Swal.fire({
                        title: "El Cliente ha sido actualizado",
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

function MEliCliente(id) {
    var obj={
        id:id
    }

    Swal.fire({
        title:"Estas seguro de eliminar este Cliente?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Confirmar",
        denyButtonText: "Cancelar"
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                type:"POST",
                url:"controlador/ClienteControlador.php?ctrEliCliente",
                data: obj,
                success: function(data){
                    console.log(data)
                    if(data="ok"){
                        location.reload()
                    }else{
                        Swal.fire({
                            title: "Error",
                            text: "El Cliente no puede ser eliminado",
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