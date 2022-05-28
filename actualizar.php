<?php
    require'config/database.php';
    require './vistas/parteSuperior.php';
    if(isset($_POST['actualizar_cliente'])){
        $id_cliente=$_POST['id_cliente'];
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $sql=mysqli_query($conexion,"UPDATE clientes SET nombre='$nombre', telefono='$telefono', correo='$correo' WHERE id_cliente='$id_cliente'");
        $msj="El cliente fue actualizado correctamente";
        $back="listaUsuarios.php";  
    }
    //Desbloquer cliente
    if(isset($_GET['id_cliente'])){
        $id_cliente=$_GET['id_cliente'];
        $sql=mysqli_query($conexion,"UPDATE clientes SET estado=1 WHERE id_cliente = $id_cliente");
        $msj="El cliente fue desbloqueado correctamente";
        $back="listaUsuarios.php"; 
    }
    //Actualizar turno
    if(isset($_POST['actualizar_turno'])){
        $id_cliente=$_POST['id_cliente'];
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $sql=mysqli_query($conexion,"UPDATE clientes SET nombre='$nombre', telefono='$telefono', correo='$correo' WHERE id_cliente='$id_cliente'");
        $msj="El turno fue actualizado correctamente";
        $back="listaServicios.php";   
    }
    //Actualizar servicio
    if(isset($_POST['actualizar_servicio'])){
        $id_servicio=$_POST['id_servicio'];
        $servicio=$_POST['servicio'];
        $precio=$_POST['precio'];
        $sql=mysqli_query($conexion,"UPDATE servicios SET servicio='$servicio', precio='$precio' WHERE id_servicio='$id_servicio'");   
        $msj="El servicio fue actualizado correctamente";
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
    <title>Actualizar</title>
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
    <?php
require './vistas/parteInferior.php';
?>
</body>

</html>