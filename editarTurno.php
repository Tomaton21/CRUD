<?php
    require './vistas/parteSuperior.php';
    require 'config/database.php';
    $id_turno=$_GET['id_turno'];
    $turno=mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM turnos WHERE id_turno = '$id_turno'"));
    echo $turno['fecha_turno'];
    $id_cliente=$turno['id_cliente'];
    $nombre=mysqli_fetch_array(mysqli_query($conexion,"SELECT nombre FROM clientes WHERE id_cliente = '$id_cliente'"));
    $servicios=mysqli_query($conexion,"SELECT servicio FROM servicios");
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
            <input type="text" id="id_turno name="id_turno" class="form-control" value="<?php echo $turno['id_turno']; ?>" readonly>
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombre[0]; ?>" readonly>
            <label for="servicio" class="form-label">Servicio</label>
            <select class="form-select" aria-label="Default select example" id="servicio" name="servicio" required>
              <option selected>Opciones</option>
              <?php
                foreach($servicios as $row){
              ?>
              <option value="<?php echo $row['servicio'] ?>"><?php echo $row['servicio'] ?></option>
              <?php
                }
              ?>
              </br>
              <label for="fecha_turno" class="form-label">Fecha de turno</label>
            </br>
            <input type="datetime-local" value="<?php echo date("c" , strtotime($turno['fecha_turno'])); ?>" class="date" name="fecha_turno"  required>
            </br>
            <!--<a class="btn btn-secondary" href="index.php">Regresar</a>-->
            <div class="d-grid  col-6 mx-auto d-md-block text-center">
              <input type="button" class="btn btn-primary btn-lg" value="Cancelar" onClick="window.location.href='./listaUsuarios.php'">
              <button type="submit" class="btn btn-primary btn-lg" name="actualizar_turno">Actualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require './vistas/parteInferior.php'; ?>