<?php
  session_start();
  if(isset($_SESSION['usuario'])){
    require './vistas/parteSuperior.php';
  }else{
    header('Location:login.php');
  }
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          <h4>Nuevo registro</h4>
        </div>

        <form class="p-4" method="POST" action="guardar.php" autocomplete="off">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" id="telefono" name="telefono" class="form-control" required>
            <label for="correo" class="form-label">Correo</label>
            <input type="email" id="correo" name="correo" class="form-control" required>
            <label for="diagnostico" class="form-label">Diagnostico</label>
            <input type="text" id="diagnostico" name="diagnostico" class="form-control" required>
            <br>
            <div class="d-grid  col-6 mx-auto d-md-block text-center">
              <!--<a class="btn btn-secondary" href="index.php">Regresar</a>-->
              <input type="button" class="btn btn-primary btn-lg" value="Cancelar"
                onClick="window.location.href='./listaUsuarios.php'">
              <button type="submit" id="guardar" class="btn btn-primary btn-lg" name="guardar_cliente">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
   require './vistas/parteInferior.php';
    ?>