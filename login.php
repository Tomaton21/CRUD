<?php
    session_start();
    if(isset($_SESSION['usuario'])){
      header('Location:listaUsuarios.php');
    }else{
      if(isset($_POST['btn_ingresar'])){
        require 'config/database.php';
        $usuario=$_POST['usuario'];
        $clave=$_POST['clave'];
        echo 'usuario: '.$usuario.' clave: '.$clave;
        $usuario=mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'"));
        if($usuario == true){
          echo $_SESSION['usuario']=$usuario['usuario'];
          header('Location:index.php');
        }else{      
          header("location: login.php?fallo=true") ;
          //$mensaje = "El usuario y/o la clave son incorrectos. Por favor intente otra vez.";
           
           // header('Location:login.php');
            //echo $mensaje;

        }
        
      }
    }
   
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="public/css/login.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Login</title>
  <style>
    body {
      background-image: url("logo3.png");
      background-repeat: no-repeat;
      background-size: contain;
      background-attachment: fixed;
      width: 100%;
      height: 80%;
    }

    .formulario {

      background: rgba(0, 0, 0, 0.089);
      padding: 20px;
      border-radius: 10px;
      color: white;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.568);
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center pt-5 mt-5 m-1">
      <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
        <form method="POST" action="login.php" autocomplete="off">
          <div class="form-group text-center pt-3">
            <h1 class="text-dark">INICIAR SESIÓN</h1>
          </div>
          <div class="form-group mx-sm-4 pb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su usuario"
              required autofocus>
          </div>
          <div class="form-group mx-sm-4 pb-3">
            <label for="clave" class="form-label">Clave</label>
            <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese su clave" required>
          </div>
          <?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "<div style='color:red'>Usuario o Clave incorrecta</div>";
       }
     ?>
          <div class="form-group mx-sm-4 pb-5 pt-3">
            <input type="submit" class="btn btn-block btn-primary ingresar" id="ingresar" name="btn_ingresar"
              value="Entrar">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>
</body>

</html>