<?php
    require './vistas/parteSuperior.php';
    require 'config/database.php';
    $id_turno=$_GET['id_turno'];
    echo $id_turno;
    $sql="DELETE FROM `turnos` WHERE id_turno = 16";
    $resultado=mysqli_query($conexion,$sql);
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
                        <?php if($resultado){ ?>
                        <h3>echo "El registro se ha eliminado correctamente.";</h3>
                        <?php } ?>
                        <a href="index.php" class="btn btn-primary float-right">Regresar</a>
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