<?php
    require './vistas/parteSuperior.php';
    require 'config/database.php';
    //Bloquear clientes
    if(isset($_GET['id_cliente'])){
        $id_cliente=$_GET['id_cliente'];
        $sql=mysqli_query($conexion,"UPDATE clientes SET estado=0 WHERE id_cliente = $id_cliente");
        $msj="El cliente fue bloqueado correctamente";
        $back="listaUsuarios.php";
    }
    //Eliminar turnos
    if(isset($_GET['id_turno'])){
        $id_turno=$_GET['id_turno'];
        $sql=mysqli_query($conexion,"DELETE FROM turnos WHERE id_turno = $id_turno");
        $msj="El turno fue borrado correctamente";
        $back="listaTurnos.php";
    }
    //Eliminar servicio
    if(isset($_GET['id_servicio'])){
        $id_servicio=$_GET['id_servicio'];
        $sql=mysqli_query($conexion,"DELETE FROM servicios WHERE id_servicio = $id_servicio");
        $msj="El servicio fue borrado correctamente";
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