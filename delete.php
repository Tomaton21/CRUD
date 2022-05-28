<?php
include 'config/database.php';
$query=("DELETE FROM `clientes` WHERE `id_cliente` = 6");
$resultado=mysqli_query($conexion, $query);