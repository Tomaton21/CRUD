<?php
  session_start();
  if(isset($_SESSION['usuario'])){
    require './vistas/parteSuperior.php';
    require 'config/database.php';
    $id_cliente=$_GET['id_cliente'];
    $sql=("SELECT nombre FROM clientes WHERE id_cliente = $id_cliente");
    $resultado=mysqli_query($conexion, $sql);
    $nombre=mysqli_fetch_array($resultado);
    $sql2=("SELECT servicio FROM servicios");
    $resultado2=mysqli_query($conexion,$sql2);
  }else{
     header('Location:login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Script css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" href="fullcalendar/main.css">

    <!-- Script js-->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/bootstrap-clockpicker.min.js"></script>
    <script src="js/moment-with-locales.js"></script>
    <script src="fullcalendar/main.js"></script>
</head>
<body>
   <div id="calendar" style="border:1px solid #000; padding:2px"></div>
    
    <!--Formulario de eventos-->
    <div class="modal fade" id="FormularioTurnos" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_turno">
                    <div class="form-row">
                    <label for="ID" class="form-label">ID</label>
                    <input type="text" id="id_cliente" name="id_cliente" class="form-control" value="<?php echo $id_cliente; ?> "readonly>
                    <label for="servicio" class="form-label">Servicio</label>
                    <select class="form-select" aria-label="Default select example" id="servicio" name="servicio">
                    <option selected>Opciones</option>
                    <?php
                        foreach($resultado2 as $row){
                    ?>
                    <option value="<?php echo $row['servicio'] ?>"><?php echo $row['servicio'] ?></option>
                    <?php
                    }
                    ?>
                    </select>
                    </div>
                    <div class="form-row">
                        <div class="from-group col-md-12">
                            <label for="">Titulo del evento</label>
                            <input type="text" class="form-control" id="title" placeholder="">
                        </div>
                    </div>
                  
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">fecha de inicio:</label>
                            <div class="input-group" data-autoclose="true">
                                <input type="date" id="fechaInicio" class="from-control" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-6" id="tituloHoraInicio">
                            <label for="">Hora de inicio:</label>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" id="horaInicio" class="from-control" autocomplete="off">
                            </div>
                        </div>                       
                    </div>
                    <div class="form-row">
                        <label for="">Color:</label>
                        <input type="color" value="#3788d8" id="color" class="form-control" style="height:36px;">
                    </div>
                    <div class="form-row">
                        <label for="">textColor:</label>
                        <input type="color"  id="textcolor" class="form-control" style="height:36px;">
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="" id="botonAgregar" class="btn btn-success">Agregar</button>
                    <button type="" id="botonModificar" class="btn btn-success">Modificar</button>
                    <button type="" id="botonBorrar" class="btn btn-success">Borrar</button>
                    <button type="" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                </div>

           
            </div>

        </div>

    </div>















   <script>

       $('.clockpicker').clockpicker();
       let calendar = new FullCalendar.Calendar(document.getElementById('calendar'),{
           events: 'datosTurnos.php?accion=listar',
           dateClick:function(info){
            limpiarFormulario();
            $('#botonAgregar').show();
            $('#botonModificar').hide();
            $('#botonBorrar').hide();

            //evaluar si damos clic en un evento o en el dia completo
            if(info.allDay){
                $('#fechaInicio').val(info.dateStr);
                $('#fechaFin').val(info.dateStr);
            }else{
                let fechaHora = info.dateStr.split("T");
                $('#fechaInicio').val(fechaHora[0]);
                $('#fechaInicio').val(fechaHora[0]);
                $('#horaInicio').val(fechaHora[1].substrig(0,5));
            }

              //recuperar la informacion del dia selecconado
            $("#FormularioTurnos").modal('show');
           },
           eventClick:function(info){          
            $('#botonAgregar').hide();
            $('#botonModificar').show();
            $('#botonBorrar').show();

            $('#title').val(info.event.title);
            $('#descripcion').val(info.event.extendedProps.descripcion);
            $('#color').val(info.event.backgroundColor);
            $('#textcolor').val(info.event.textColor);
            $('#fechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
            $('#fechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
            $('#horaInicio').val(moment(info.event.end).format("HH:mm"));
            $('#horaFin').val(moment(info.event.end).format("HH:mm"));
            


            $('#FormularioTurnos').modal('show');
           }
       });

       calendar.render();

       //eventos de botones de la app
       $('#botonAgregar').click(function(){
           let registro = recuperarDatosFormulario();
           agregarRegistro(registro);
           $('#FormularioTurnos').modal('hide');
       });

       $('#botonModificar').click(function(){
        let registro = recuperarDatosFormulario();  
        modificarRegistro(registro); 
        $('#FormularioTurnos').modal('hide');
       });

       $('#botonBorrar').click(function(){
        let registro = recuperarDatosFormulario();
        borrarRegistro(registro);
        $('#FormularioTurnos').modal('hide');
       });



       //funciones para comunicarse con el servidor ajax

       //funcion para agregar un registro
       function agregarRegistro(registro){
            $.ajax({
            type:"POST",
            url:'datosTurnos.php?accion=agregar',
            data: registro,
            success: function(msg){
            alert("ha sido ejecutado satifactoriamete");
        //actualiza los registro del calendario
            calendar.refetchEvents();         
            },
            error: function(error){
            alert("Hubo un error al agregar el evento: "+ error);
            }
            });
        }


        //funcion para modificar un registro

        function modificarRegistro(registro){
            $.ajax({
            type:'POST',
            url:'datosTurnos.php?accion=modificar',
            data: registro,
            success: function(msg){
        //actualiza los registro del calendario
            calendar.refetchEvents()            
            },
            error: function(error){
            alert("Hubo un error al modificar el evento: "+ error);
            }
            });
            }


            //borra los registros
            function borrarRegistro(registro){
            $.ajax({
            type:"POST",
            url:"datosTurnos.php?accion=borrar",
            data: registro,
            success: function(msg){
        //actualiza los registro del calendario
            calendar.refetchEvents();            
            },
            error: function(error){
            alert("Hubo un error al borrar el evento: "+ error);
            }
            });
            }
             

       //las funciones que interactuan con el formulario eventos
       function limpiarFormulario(){
           $('#id_turno').val('');
           $('#title').val('');
           $('#descripcion').val('');
           $('#color').val('#3788d8');
           $('#textcolor').val('#ffffff');
           $('#fechaInicio').val('');
           $('#horaInicio').val('');
           $('#fechaFin').val('');
           $('#horaFin').val('');
       }

       function recuperarDatosFormulario(){     
           let registro = {
               id_turno: $("#id_turno").val(),
               title: $("#title").val(),
               descripcion: $('#descripcion').val(),
               color: $('#color').val(),
               textcolor: $('#textcolor').val(),
               start: $('#fechaInicio').val()+' '+$('#horaInicio').val(),
               end: $('#fechaFin').val()+' '+$('#horaFin').val()
           }
           return registro;
       }



   </script>
</body>
</html>
<?php
 require './vistas/parteInferior.php';
 ?> 