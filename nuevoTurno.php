<?php
  session_start();
  if(isset($_SESSION['usuario'])){
    require './vistas/parteSuperior.php';
    require 'config/database.php';
    $id_cliente=$_GET['id_cliente'];
    $sql=("SELECT nombre FROM clientes WHERE id_cliente = $id_cliente");
    $resultado=mysqli_query($conexion, $sql);
    $nombre=mysqli_fetch_array($resultado);
    $sql2=("SELECT servicio FROM servicios");
    $resultado2=mysqli_query($conexion,$sql2);
  }else{
     header('Location:login.php');
  }
?>

<main class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          <h4>Nuevo Turno</h4>
        </div>
        <form class="p-4" method="POST" action="guardar.php" autocomplete="off">
          <div class="mb-3">
            <label for="ID" class="form-label">ID</label>
            <input type="text" id="id_cliente" name="id_cliente" class="form-control" value="<?php echo $id_cliente; ?>" readonly>
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombre[0]; ?>" readonly>
            <label for="servicio" class="form-label">Servicio</label>

            <select class="form-select" aria-label="Default select example" id="servicio" name="servicio" required>
              <option selected>Opciones</option>
              <?php
                foreach($resultado2 as $row){
              ?>
              <option value="<?php echo $row['servicio'] ?>"><?php echo $row['servicio'] ?></option>
              <?php
                }
              ?>
            </select>
            <label for="ingreso" class="form-label">Fecha de turno</label>
            </br>
            <input type="datetime-local" name="fecha_turno"required>
            </br>
            <!--<a class="btn btn-secondary" href="index.php">Regresar</a>-->
            <div class="d-grid  col-6 mx-auto d-md-block text-center">
              <input type="button" class="btn btn-primary btn-lg" value="Cancelar" onClick="window.location.href='./listaTurnos.php'">
              <button type="submit" id="guardar_turno" class="btn btn-primary btn-lg" name="guardar_turno">Guardar</button>
            </div>
        </form>
      </div>
    </div>
    <div class="col-md-8 offset-md-2">
        <div id='calendar'>
        <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        </div>  
    </div>
</main>
<?php
  if(isset($_POST['guardar_turno'])){
    require 'config/database.php';
    $id_cliente=$_POST['id_cliente'];
    $servicio=$_POST['servicio'];
    $fecha_turno=$_POST['fecha_turno'];
    $sql1=mysqli_query($conexion,"SELECT fecha_turno FROM turnos");
    
    if(mysqli_num_rows($sql1) != 0){
        foreach($sql1 as $row){
            if($fecha_turno = $row['fecha_turno']){
                echo "Ya existe un turno en esa fecha y hora";
            }else{
                $id_servicio=mysqli_fetch_array(mysqli_query($conexion, "SELECT id_servicio FROM servicios WHERE servicio = '$servicio'"));
                $sql=mysqli_query($conexion,"INSERT INTO turnos (id_turno, id_cliente, id_servicio, fecha_turno) VALUES ('NULL', '$id_cliente', '$id_servicio[0]', '$fecha_turno')");
            }
        }
    }else{
        $id_servicio=mysqli_fetch_array(mysqli_query($conexion, "SELECT id_servicio FROM servicios WHERE servicio = '$servicio'"));
        $sql=mysqli_query($conexion,"INSERT INTO turnos (id_turno, id_cliente, id_servicio, fecha_turno) VALUES ('NULL', '$id_cliente', '$id_servicio[0]', '$fecha_turno')");
    }
 }
?>
<?php
   require './vistas/parteInferior.php';
    ?>
</body>

</html>