var url="../beachPlay/Controlador/Persona.php";
function Consultar(){
    
        $.ajax({   
            url: url,
            data:{"accion":"CONSULTAR"},
            type:'POST',
            dataType:'json'
            
        }).done(function(response){
            var html=""; 
                $.each(response,function(index,data){
                    html+="<tr>";
                    html+="<td><button class='btn btn-warning' onclick='ConsultarID("+data.id_producto+");'><span class='fa fa-edit'></span>MODIFICAR</button></td>";
                    html+="<td><button class='btn btn-danger' onclick='Eliminar("+data.id_producto+");'><span class='fa fa-trash'></span>ELIMINAR</button></td>";


                    html+="<td>"+data.id_producto+"</td>";
                    html+="<td>"+data.nombre+"</td>";
                    html+="<td>"+data.precio+"</td>";
                    html+="<td>"+data.descripcion+"</td>";
                    html+="</td>";
                  
                    html+="</tr>"; 
                });
                document.getElementById("datos").innerHTML=html;

        }).fail(function(response){
            console.log(response);
        });
}
function ConsultarID(id_producto){
    $.ajax({   
        url: url,
        data:{"id_producto":id_producto,"accion":"CONSULTAR_ID"},
        type:'POST',
        dataType:'json'
        
    }).done(function(response){

        document.getElementById('nombre').value=response.nombre;
        document.getElementById('precio').value=response.precio;
        document.getElementById('descripcion').value=response.descripcion;
        document.getElementById('id_producto').value=response.id_producto;

         
    }).fail(function(response){
        console.log(response);
    });
}
function Guardar(){

    var mensaje;
    var opcion = confirm("Desea continuar o cancelar?");
    if (opcion == true) {
        $.ajax({   
            url: url,
            data:retornarDatos("GUARDAR"),
            type:'POST',
            dataType:'json'
            
        }).done(function(response){
    
            if(response=='OK'){
                alert("datos guardados");
            }else
            {
                alert(response)
            }
             
        }).fail(function(response){
            console.log(response);
        });
	} else {
	    mensaje = "Has clickado Cancelar";
	}
    
}
function Modificar(){
    $.ajax({   
        url: url,
        data:retornarDatos("MODIFICAR"),
        type:'POST',
        dataType:'json'
        
    }).done(function(response){
      

        if(response=='OK'){
            alert("datos guardados");
        }else
        {
            alert(response)
        }
         
    }).fail(function(response){
        console.log(response);
    });
}
function Eliminar(id_producto){
    $.ajax({   
        url: url,
        data:{"id_producto":id_producto,"accion":"ELIMINAR"},
        type:'POST',
        dataType:'json'
        
    }).done(function(response){
       
        if(response=='OK'){
            alert("Se elimino correctamente los datos. ");
             Consultar();
        }else
        {
            alert(response)
        }
         
    }).fail(function(response){
        console.log(response);
    });
}
function Validar(){
    nombre=document.getElementById('nombre').value;
    precio=document.getElementById('precio').value;
    descripcion=document.getElementById('descripcion').value;
    if(nombre=="" ||precio=="" ||descripcion=="" ){
        return false;
    }
    return true;

}

function retornarDatos(accion){
    return{
        "nombre":document.getElementById('nombre').value,
        "precio":document.getElementById('precio').value,
        "descripcion":document.getElementById('descripcion').value,
        "accion":accion,
        "id_producto":document.getElementById('id_producto').value


    };
}

function alerta()
    {
    var mensaje;
    var opcion = confirm("Clicka en Aceptar o Cancelar");
    if (opcion == true) {
        mensaje = "Has clickado OK";
	} else {
	    mensaje = "Has clickado Cancelar";
	}
	document.getElementById("ejemplo").innerHTML = mensaje;
}