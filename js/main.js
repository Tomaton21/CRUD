$(document).ready( function () {
    $('#tablaCliente').DataTable();


/*$(document).ready(function(){
   
    tablaCliente = $("#tablaCliente").DataTable({
        "columnDefs":[{
        "targets":-1,
        "data":null,
        "defaultContent":"<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar5</button><button class='btn btn-danger btnborrar'>Borrar5</button></div></div>"
        }]

        /*"Lenguage":{
            "lengthMenu":"mostrar_MENU_registro",
            "zeroRecords": "no se encontraraon resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registro el 0 al 0 de un total de 0 registros",
            "infoFiltered": "Filtrando de un total de _MAX_ registros",
            "#Search": "Buscar",
            "#Paginate": {
                "#First":"Primero",
                "#Last":"Ultimo",
                "#Next":"Siguiente",
                "#Previous":"Anterior"
            },
            "#Processing":"Procesando",
        }
    });*/

$('#btnNuevo').click(function(){
    $('#formCliente').trigger("reset");
    $('.modal-header').css("background-color",'#28a745');
    $('.modal-header').css("color",'white');
    $('.modal-title').text("Nuevo cliente");
    $('#modalCRUD').modal("show");
    $id = null;
});

$("#formCliente").submit(function(e){
    e.preventDefault();
    id = $.trim($("#id").val());
    nombre = $.trim($("#nombre").val());
    telefono = $.trim($("#telefono").val());
    detalle = $.trim($("#detalle").val());
    $.ajax({
        url: "bd/crud.php",
        type:"POST",
        dataType:"json",
        data:{nombre:nombre,telefono:telefono,detalle:detalle,id:id},
        success: function(data){
            console.log(data);
            //var datos = JSON.parse(data);
            id = data[0].id;
            nombre = data[0].nombre;
            telefono = data[0].telefono;
            detalle = data[0].detalle;
            tablaCliente.row.add([id,nombre,telefono,detalle]).draw();
        }

        
});

$('#modalCRUD').modal("hide");
});
        
 });

