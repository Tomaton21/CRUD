<?php
include_once './config/database.php';
$servicio = "Alisado";
$sql2=("SELECT id_servicio FROM servicios WHERE servicio = 'Alisado'");
$resultado2=mysqli_query($conexion, $sql2);
$nombre=mysqli_fetch_array($resultado2);
echo $nombre[0];