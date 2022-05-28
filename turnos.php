<?php
    require './vistas/parteSuperior.php';
    require 'config/database.php';
    $id_cliente=$_GET['id_cliente'];
    $cliente=mysqli_fetch_array(mysqli_query($conexion,"SELECT nombre FROM clientes WHERE id_cliente = $id_cliente"));
    $turnos=mysqli_query($conexion,"SELECT * FROM turnos WHERE id_cliente = $id_cliente");
    mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">

                    <h5 class="card-title">Lista de turnos de: <?php echo $cliente[0]; ?></h5>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="nuevoTurno.php?id_cliente=<?php echo $id_cliente; ?>" class="btn btn-success float-right">Nuevo turno</a>
                        <a href="listaUsuarios.php" class="btn btn-primary float-right">Regresar</a>
                    </div>
                </div>
                <div class="p-4">
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID turno</th>
                                <th scope="col">Fecha del turno</th>
                                <th scope="col">Servicio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($turnos as $row1){ ?>
                            <tr>
                                <td><?php echo $row1['id_turno']; ?></td>
                                <td><?php echo $row1['fecha_turno']; ?></td>
                                <?php require 'config/database.php'; ?>
                                <?php $id_servicio=$row1['id_servicio']; ?>
                                <?php $servicio=mysqli_query($conexion,"SELECT * FROM servicios WHERE id_servicio = $id_servicio"); ?>
                                <?php foreach($servicio as $row2){ ?>
                                <td><?php echo $row2['servicio']; ?></td>
                            <?php } ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="">
                                        <a href="editarTurno.php?id_turno=<?php echo $row1['id_turno']; ?>" class="btn btn-warning">Editar</a>
                                        <a onclick="return confirm('¿Estas segura de eliminar este turno?');" href="eliminar.php?id_turno=<?php echo $row['id_turno']; ?>" class="btn btn-danger">Borrar</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div <?php
    require './vistas/parteInferior.php';
    ?> </body> </html>