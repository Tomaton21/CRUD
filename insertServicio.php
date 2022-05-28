<?php
   session_start();
   if(isset($_SESSION['usuario'])){
      require 'config/database.php';
      if(isset($_POST['guardar_servicio'])){
         $servicio=$_POST['servicio'];
         $precio=$_POST['precio'];
         echo $servicio,$precio;
         $sql1=("INSERT INTO servicios(id_servicio, servicio, precio) VALUES('NULL','$servicio','$precio')");
         $resultado=mysqli_query($conexion,$sql1);
         mysqli_close($conexion);
      }   
   }else{
      header('Location:login.php');
   }   
?>
