<?php 
     require './vistas/parteSuperior.php';
    require 'config/database.php';
    //Guardar clientes 
    if(isset($_POST['guardar_cliente'])){
       $nombre=$_POST['nombre'];
       $correo=$_POST['correo'];
       $telefono=$_POST['telefono'];
       $diagnostico=$_POST['diagnostico'];
       $sql=mysqli_query($conexion,"INSERT INTO clientes(id_cliente, nombre, correo, telefono, diagnostico) VALUES('NULL','$nombre','$correo','$telefono','$diagnostico')");
       $msj="El cliente fue registrado correctamente";
       $back="listaUsuarios.php";
    }
    //Guardar turnos 
    if(isset($_POST['guardar_turno'])){
        $id_cliente=$_POST['id_cliente'];
        $servicio=$_POST['servicio'];
        $fecha_turno=$_POST['fecha_turno'];
        $sql=mysqli_query($conexion,"SELECT fecha_turno FROM turnos WHERE fecha_turno = '$fecha_turno'");
    
        if(mysqli_num_rows($sql) == 1){
            $msj="No fue posible guardar el turno por que ya existe otro en esa fecha y turno";
            $back="listaUsuarios.php";
        }else{
            $id_servicio=mysqli_fetch_array(mysqli_query($conexion, "SELECT id_servicio FROM servicios WHERE servicio = '$servicio'"));
            $sql=mysqli_query($conexion,"INSERT INTO turnos (id_turno, id_cliente, id_servicio, fecha_turno) VALUES ('NULL', '$id_cliente', '$id_servicio[0]', '$fecha_turno')");
            $msj = "El turno fue creado correctamente";
            $back="listaUsuarios.php";
        }

    }
    //Guardar servicios
    if(isset($_POST['guardar_servicio'])){
        $servicio=$_POST['servicio'];
        $precio=$_POST['precio'];
        $sql=mysqli_query($conexion,"INSERT INTO servicios(id_servicio, servicio, precio) VALUES ('NULL', '$servicio', '$precio')");
        $msj = "El servicio fue creado correctamente";
        $back="listaServicios.php";
    }
    mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

<body class="py-3">
    <main class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3><?php echo $msj; ?></h3>
                        <a href="<?php echo $back; ?>" class="btn btn-primary float-right">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require './vistas/parteInferior.php'; ?>
</body>
</html>