<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    
</head>
<body>

<section class='main-home'>

    <div class="contenedor-1">

    

        <IMG src="/resources/privado.png"></IMG>   
        <h2>Login</h2>
        <span>Ingresa tus datos</span> 


     
    </div>

        <div class='contenedor-2'>


        <!-- Creación de formulario-->
        <form action="<?php echo base_url('/login')?>" name="user_lg" method="POST">


        <!-- Field de usuario-->
        <label>Usuario</label><br>
        <input type="text" id="input-perron" name="input-user" placeholder="User" required=""><br><br>

        <!-- Field de password-->
        <label>Contraseña</label><br>
        <input type="password" id="password" name="input-pass" placeholder="Password" required=""> 
        <br><br> 

        <!-- Botón-->
        <button type="submit">Acceder</button>


        </form>
        <!-- Fin del formulario-->
        </div>

        
    </div>

</section>


<footer>



</footer>

<!-- SCRIPTS -->

<script {csp-script-nonce}>
    document.getElementById("menuToggle").addEventListener('click', toggleMenu);
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- -->

</body>
</html>
