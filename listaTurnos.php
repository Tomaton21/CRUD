<?php
     session_start();
     if(isset($_SESSION['usuario'])){
        require './vistas/parteSuperior.php';
        require 'config/database.php';
        $sql=("SELECT * FROM turnos");
        $resultado=mysqli_query($conexion,$sql);
     }else{
        header('Location:login.php');
     }
?>
<!--<div class="container">-->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Lista de Turnos</h5>
                    <div class="card-header">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        
                    </div>
                </div>
                    <!-- <a href="nuevo.php" class="btn btn-success float-right">Nuevo</a>-->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    </div>
                </div>
                <div class="p-4">
                    <table class="table table-md ">
                        <thead>
                            <tr>
                                <th scope="col">ID Turno</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Servicio</th>
                                <th scope="col">Fecha y hora</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($resultado as $row){ ?>
                            <tr>
                                <td><?php echo $row['id_turno']; ?></td>
                                <td>
                                <?php require 'config/database.php'; ?>
                                <?php $id_cliente = $row['id_cliente']; ?>
                                <?php $sql1=mysqli_fetch_array(mysqli_query($conexion,"SELECT nombre FROM clientes WHERE id_cliente = $id_cliente")); ?>
                                <?php echo $sql1[0]; ?>
                                </td>
                                <td>
                                <?php require 'config/database.php'; ?>
                                <?php $id_servicio = $row['id_servicio']; ?>
                                <?php $sql1=mysqli_fetch_array(mysqli_query($conexion,"SELECT servicio FROM servicios WHERE id_servicio = $id_servicio")); ?>
                                <?php echo $sql1[0]; ?>
                                </td>
                                <td><?php echo $row['fecha_turno']; ?></td>
                                <td>
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

<?php 
    require './vistas/parteInferior.php'; 
?>