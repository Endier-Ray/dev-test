<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    
</head>
<body>

<section class='row-father'>

    <section class='row-1'>

        <div class="contenedor-1">

            <div class="icono">

                
            <h2>Bienvenido <?php echo session('usuario');?></h2>
            <p>Rol: <?php echo session('rol');?></p>
            </div>
        </div>

            <div class='contenedor-2'>
            
            <a href="<?php echo base_url('/salir') ?>">Salir</a>

            </div>

            
        </div>

    </section>


    <section class='row-2'>

               <!-- lorem-->
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit laudantium culpa quia quidem soluta et atque tempora! Mollitia, totam quasi. Totam quae quibusdam adipisci et modi esse voluptates vero maxime!</p>

    </section>

</section>
<footer>



</footer>


<!-- -->

</body>
</html>
