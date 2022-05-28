<?php
     session_start();
     if(isset($_SESSION['usuario'])){
        require './vistas/parteSuperior.php';
        require 'config/database.php';
        $sql=("SELECT * FROM clientes WHERE estado = 1");
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
                    <h5 class="card-title">Lista de clientes</h5>
                    <!-- <a href="nuevo.php" class="btn btn-success float-right">Nuevo</a>-->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <a class="btn btn-primary me-md-2" href="nuevo.php">Nuevo<a>
                        <a class="btn btn-secondary me-md-2" href="listaUsuariosBloqueados.php">Clientes bloqueados<a>
                    </div>
                </div>
                <div class="p-4">
                    <table class="table table-responsive table-striped ">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col" colspan="4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                foreach($resultado as $row){
                ?>
                            <tr>
                                <td><?php echo $row['id_cliente']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['correo']; ?></td>
                                <td><?php echo $row['telefono']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="">
                                        <a href="editarCliente.php?id_cliente=<?php echo $row['id_cliente']; ?>" class="btn btn-warning">Editar</a>
                                        <a onclick="return confirm('¿Estas segura de eliminar este cliente?');"
                                            href="eliminar.php?id_cliente=<?php echo $row['id_cliente']; ?>"
                                            class="btn btn-danger">Bloquear</a>
                                        <a href="turnos.php?id_cliente=<?php echo $row['id_cliente']; ?>"
                                            class="btn btn-primary">Turnos</a>
                                        <a href="recibos.php?id_cliente=<?php echo $row['id_cliente']; ?>"
                                            class="btn btn-secondary">Diagnostico</a>
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