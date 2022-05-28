<?php
 require './vistas/parteSuperior.php';
  require 'config/database.php';
  $id_servicio=$_GET['id_servicio'];
  echo $id_servicio;
  $servicio=mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM servicios WHERE id_servicio = $id_servicio"));

?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          <h3>Editar cliente</h>
        </div>

        <form class="p-4" method="POST" action="actualizar.php" autocomplete="off">
          <div class="mb-3">
            <label for="ID" class="form-label">ID</label>
            <input type="text" id="id_servicio" name="id_servicio" class="form-control" value="<?php echo $servicio['id_servicio']; ?>" readonly>
            <label for="nombre" class="form-label">Servicio</label>
            <input type="text" id="servicio" name="servicio" class="form-control" value="<?php echo $servicio['servicio']; ?>" required autofocus>
            <label for="precio" class="form-label">Precio</label>
            <input type="text" id="precio" name="precio" class="form-control" value="<?php echo $servicio['precio']; ?>" autofocus required>
            <br>
            <!--<a class="btn btn-secondary" href="index.php">Regresar</a>-->
            <div class="d-grid  col-6 mx-auto d-md-block text-center">
              <input type="button" class="btn btn-primary btn-lg" value="Cancelar"
                onClick="window.location.href='./listaUsuarios.php'">
              <button type="submit" class="btn btn-primary btn-lg" name="actualizar_servicio">Actualizar</button>
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