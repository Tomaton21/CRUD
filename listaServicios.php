<?php
    ;
     session_start();
     if(isset($_SESSION['usuario'])){
        require './vistas/parteSuperior.php';
        require 'config/database.php';
        $sql=mysqli_query($conexion,"SELECT * FROM servicios");
     }else{
        header('Location:login.php');
     }
     mysqli_close($conexion);
?>
<!--<div class="container">-->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Lista de servicios</h5>
                    <!-- <a href="nuevo.php" class="btn btn-success float-right">Nuevo</a>-->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-primary me-md-2" href="nuevoServicio.php">Nuevo<a>
                    </div>
                </div>
                <div class="p-4">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Servicio</th>
                                <th scope="col">Precio</th>
                                <th scope="col" colspan="4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($sql as $row){ ?>
                            <tr>
                                <td><?php echo $row['id_servicio']; ?></td>
                                <td><?php echo $row['servicio']; ?></td>
                                <td><?php echo $row['precio']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="">
                                        <a href="editarServicio.php?id_servicio=<?php echo $row['id_servicio']; ?>" class="btn btn-warning">Editar</a>
                                        <a onclick="return confirm('¿Estas segura de eliminar este servicio?');" href="eliminar.php?id_servicio=<?php echo $row['id_servicio']; ?>" class="btn btn-danger">Borrar</a>
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
<?php require './vistas/parteInferior.php'; ?>