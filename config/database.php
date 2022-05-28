<?php
    $conexion=mysqli_connect("localhost","root","","mony_ali_nails");
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clientes</title>
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <script src="public/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="py-3">
    <main class="container">
        <footer class="fixed-bottom"> 
        <?php if($conexion){ ?>
        <h6><?php echo "Conexion exitosa"; ?></h6>
        <?php }else{ ?>
            <h6><?php echo "Error en la exitosa"; ?></h6>
        <?php } ?>
        </footer>
    </main>
    </body>
    </html>