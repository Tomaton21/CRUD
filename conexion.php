<?php
    function conectar(){     
        $server ="localhost";
        $usuario = "admin";
        $clave = "admin";
        $base = "crud_2022";
        $conexion = mysqli_connect($server,$usuario,$clave,$base)or die("Problemas con la conexion");
        mysqli_set_charset($conexion,'utf8');
        return $conexion;

    };
?>