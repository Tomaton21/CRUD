<?php  
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location:login.php');
    }else{
        $usuario=$_SESSION['usuario'];
        require'config/database.php';
        $sql=("SELECT * FROM usuarios WHERE usuario = '$usuario'");
        $resultado=mysqli_query($conexion, $sql);
        $usuario=mysqli_fetch_array($resultado);
        if($usuario==true){
            header('Location:listaUsuarios.php');
        }
    }
?>