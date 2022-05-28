<?php
    //convierte todo a json
    header('Content-Type:application/json');
    require("conexion.php");

    $conexion = conectar();

    switch($_GET['accion']){
        case 'listar':
            $datos = mysqli_query($conexion, 
            "select id_turno,
            title,
            descripcion,
            color,
            textcolor,
            start,
            end from turnos"
            );

            $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
            echo json_encode($resultado);
        break;

        case 'agregar':
            $respuesta = mysqli_query($conexion, "insert into turnos( title, descripcion, color, textcolor, start, end) values
            ('$_POST[title]','$_POST[descripcion]','$_POST[color]','$_POST[textcolor]','$_POST[start]','$_POST[end]')");
            echo json_encode($respuesta);
        break;

        case 'modificar':
            $respuesta = mysqli_query($conexion, "update turnos set title = '$_POST[title]',
            descripcion = '$_POST[descripcion]',
            color = '$_POST[color]',
            textcolor = '$_POST[textcolor]',
            start= '$_POST[start]',
            end = '$_POST[end]'
            where id_turno = '$_POST[id_turno]'");
           
            echo json_encode($respuesta);
           
        break;

        case 'borrar':
            $respuesta = mysqli_query($conexion,"delete from turnos where id_turno= '$_POST[id_turno]'");

            echo json_encode($respuesta);
        break;
    }
?>