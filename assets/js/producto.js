function MNuevoProducto(){
    $("#modal-lg").modal("show")
    
    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/producto/FNuevoProducto.php",
        data: obj,
        success: function(data){
            $("#content-lg").html(data)
        }
    })
    
}

function RegProducto(){
    var formData= new FormData($("#FRegProducto")[0])//Extrae informacion del formulario producto
    
    if(formData.get("password")==formData.get("vrPassword")){
       $.ajax({
        type:"POST",
        url:"controlador/productoControlador.php?ctrRegProducto",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            
            if(data="ok"){
                
                Swal.fire({
                  title: "El Producto ha sido registrado",
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

function MEditProducto(id) {
    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/producto/FEditProducto.php?id="+id,
        data: obj,
        success: function(data){
            $("#content-default").html(data)
        }
    })
}

function MEditProducto(id) {
    var formData= new FormData($("#FEditProducto")[0])//Extrae informacion del formulario producto

    if(formData.get("password")==formData.get("vrPassword")){
        $.ajax({
            type:"POST",
            url:"controlador/productoControlador.php?ctrEditProducto",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
            console.log(data)
                if(data="ok"){

                    Swal.fire({
                        title: "El Producto ha sido actualizado",
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

function MEliProducto(id) {
    var obj={
        id:id
    }

    Swal.fire({
        title:"Estas seguro de eliminar este producto?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Confirmar",
        denyButtonText: "Cancelar"
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                type:"POST",
                url:"controlador/productoControlador.php?ctrEliProducto",
                data: obj,
                success: function(data){
                    console.log(data)
                    if(data="ok"){
                        location.reload()
                    }else{
                        Swal.fire({
                            title: "Error",
                            text: "El producto no puede ser eliminado",
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

function previsualizar() {
    let image=document.getElementById("imgProducto").files[0]
    
    if(image["type"]!="image/png" && image["type"]!="image/jpeg"){

        $("#imgProducto").val("")

        Swal.fire({
            title: "El archivo no es JPG o PNG",
            icon:"error",
            showConfirmButton: false,
        })
    }else if(image["size"]>10000000){
        $("#imgProducto").val("")
        
        Swal.fire({
            title: "El archivo no puede ser mayor a 10MB",
            icon:"error",
            showConfirmButton: false,
        })
    }else{
        
        let datosImagen=new FileReader
        datosImagen.readAsDataURL(image)
        
        $(datosImagen).on("load",function (event) {
            let rutaImagen=event.target.result
            $(".previsualizar").attr("src",rutaImagen)
        })
    }
}

function SinCatalogo() {
    var obj={
        codigoAmbiente: 2,
        codigoPuntoVenta: 0,
        codigoPuntoVentaSpicified: true,
        codigoSistema: "775FA42BE90F7B78EF98F57",
        codigoSucursal: 0,
        cuis: "9272DC05",
        nit: 338794023
    }

    $.ajax({
        type:"POST",
        url:"http://localhost:5000/Sincronizacion/listaproductosservicios?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJTdXBlcmppY2hvMzMiLCJjb2RpZ29TaXN0ZW1hIjoiNzc1RkE0MkJFOTBGN0I3OEVGOThGNTciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0ydGpDM05ERXdNZ1lBOFFXMzNRa0FBQUE9IiwiaWQiOjYxODYwOCwiZXhwIjoxNzMzOTYxNjAwLCJpYXQiOjE3MDI0OTc2NjAsIm5pdERlbGVnYWRvIjozMzg3OTQwMjMsInN1YnNpc3RlbWEiOiJTRkUifQ.4K_pQUXnIhgI5ymmXoyL43i0pSk3uKCgLMkmQeyl67h7j55GSRsH120AD44pR0aQ1UX_FNYzWQBYrX6pWLd-1w",
        data: JSON.stringify(obj),
        cache: false,
        contentType: "application/json",
        success: function(data){
            $(".odd").remove()
            for (var i = 0; i < data["listaCodigos"].length; i++) {
              $("#CatProductos").append("<tr><td>"+data["listaCodigos"][i]["codigoActividad"]+"</td><td>"+data["listaCodigos"][i]["codigoProducto"]+"</td><td>"+data["listaCodigos"][i]["descripcionProducto"]+"</td><td></td></tr>")
            }
        }
    })
}

function unidadesMedida() {
    var obj={
        codigoAmbiente: 2,
        codigoPuntoVenta: 0,
        codigoPuntoVentaSpicified: true,
        codigoSistema: "775FA42BE90F7B78EF98F57",
        codigoSucursal: 0,
        cuis: "9272DC05",
        nit: 338794023
    }

    $.ajax({
        type:"POST",
        url:"http://localhost:5000/Sincronizacion/unidadmedida?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJTdXBlcmppY2hvMzMiLCJjb2RpZ29TaXN0ZW1hIjoiNzc1RkE0MkJFOTBGN0I3OEVGOThGNTciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0ydGpDM05ERXdNZ1lBOFFXMzNRa0FBQUE9IiwiaWQiOjYxODYwOCwiZXhwIjoxNzMzOTYxNjAwLCJpYXQiOjE3MDI0OTc2NjAsIm5pdERlbGVnYWRvIjozMzg3OTQwMjMsInN1YnNpc3RlbWEiOiJTRkUifQ.4K_pQUXnIhgI5ymmXoyL43i0pSk3uKCgLMkmQeyl67h7j55GSRsH120AD44pR0aQ1UX_FNYzWQBYrX6pWLd-1w",
        data: JSON.stringify(obj),
        cache: false,
        contentType: "application/json",
        success: function(data){
            console.log(data)
        }
    })
}
