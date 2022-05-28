<?php
 require './vistas/parteSuperior.php';
  require 'config/database.php';
  $id_cliente = $_GET['id_cliente'];
  $sql=("SELECT * FROM clientes WHERE id_cliente = $id_cliente");
  $resultado=mysqli_query($conexion,$sql);
  $row=mysqli_fetch_array($resultado);
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
            <input type="text" id="id_cliente" name="id_cliente" class="form-control"
              value="<?php echo $row['id_cliente']; ?>" readonly>
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" class="form-control" autofocus required
              value="<?php echo $row['nombre']; ?>" required>
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" id="telefono" name="telefono" class="form-control" autofocus required
              value="<?php echo $row['telefono']; ?>" required>
            <label for="correo" class="form-label">Correo</label>
            <input type="email" id="correo" name="correo" class="form-control" autofocus required
              value="<?php echo $row['correo']; ?>" required>
            <br>
            <!--<a class="btn btn-secondary" href="index.php">Regresar</a>-->
            <div class="d-grid  col-6 mx-auto d-md-block text-center">
              <input type="button" class="btn btn-primary btn-lg" value="Cancelar"
                onClick="window.location.href='./listaUsuarios.php'">
              <button type="submit" class="btn btn-primary btn-lg" name="actualizar_cliente">Actualizar</button>
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