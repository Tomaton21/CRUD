<?php
  session_start();
  if(isset($_SESSION['usuario'])){
    require './vistas/parteSuperior.php';
    require 'config/database.php';
  }else{
    header('Location:login.php');
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" conntent="width=device-width, initial-scale=0">
  <title>Nuevo servicio</title>
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <script src="public/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
</head>
<body>  
  <main class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center">
            <h4>Nuevo servicio</h4>
          </div>
          <form class="p-4" method="POST" action="guardar.php" autocomplete="off">
            <div class="mb-3">
            <label for="servicio" class="form-label">Servicio</label>
            <input type="text" id="servicio" name="servicio" class="form-control" required>
            <label for="precio" class="form-label">Precio</label>
            <input type="text" id="precio" name="precio" class="form-control" required>
            <br>
            <a class="btn btn-secondary" href="listaServicios.php">Regresar</a>
            <button type="submit" id="guardar_servicio" class="btn btn-primary" name="guardar_servicio">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <?php
   require './vistas/parteInferior.php';
    ?>
</body>

</html>