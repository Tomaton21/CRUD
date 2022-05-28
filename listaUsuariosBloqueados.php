<?php
    session_start();
    require './vistas/parteSuperior.php';
    require 'config/database.php';
    if(isset($_SESSION['usuario'])){
        $bloqueados=mysqli_query($conexion,"SELECT * FROM clientes WHERE estado = 0");
    }else{
        header('Location:login.php');
    }
    mysqli_close($conexion);
?>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <?php if(mysqli_num_rows($bloqueados) != 0){ ?>
            <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Lista de clientes Bloqueados</h5>
                    <a href="listaUsuarios.php" class="btn btn-success float-right">Regresar</a>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
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
                            <?php foreach($bloqueados as $row){ ?>
                            <tr>
                                <td><?php echo $row['id_cliente']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['correo']; ?></td>
                                <td><?php echo $row['telefono']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="">
                                        <a href="actualizar.php?id_cliente=<?php echo $row['id_cliente']; ?>" class="btn btn-primary">Desbloquear</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php }else{ ?>
            <main class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h3><?php echo "No hay clientes bloqueados"; ?></h3>
                                <a href="listaUsuarios.php" class="btn btn-primary float-right">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        <?php } ?>
    </div>
</div>
</body>
<?php require './vistas/parteInferior.php'; ?>




