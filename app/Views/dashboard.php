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

            <h3 align='center'>Lista de Usuarios</h3>
                <table>
                    <thead>
                       <?php foreach($lista as $col): ?>
                        <form action="<?= base_url('actualizar/'.$col['id_usuario']) ?>" method="POST">
                        <tr>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Nueva Contraseña</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                             
                            <td><input type="text" name="user-act" value="<?= $col['usuario'] ?>"></td>
                            <td>  <select id="rol-act" name="input-rol-act" required="">
                                        <option value="<?= $col['rol'] ?>" hidden selected><?= $col['rol'] ?></option>
                                        <option value="admin">admin</option>
                                        <option value="empleado">empleado</option>
                                   </select></td>
                                    <td><input type="text" name="pass-act" value=""></td>
                            <td><button type="submit" class="btn-act" onclick="return confirm('Seguro que desea actualizar?')">Guardar</button>
                        </form>
                                            <td><a href="<?= base_url('eliminar/'.$col['id_usuario']) ?>" class="btn-delete" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                Borrar
                </a>
            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (session()->getFlashdata('mensaje') == 'Usuario existente'): ?>
    <div class="alert alert-danger">
        ¡Error! El nombre de usuario ya está en uso. Intenta con otro.
    </div>
<?php endif; ?>
                    </tbody>
                </table>

    </section>

    <section class='row-3'>
        
        <h1>Registro</h1>
               <!-- Creación de formulario-->
        <form action="<?php echo base_url('/registrar')?>" name="user_regist" method="POST">


        <!-- Field de usuario-->
        <label>Usuario</label><br>
        <input type="text" id="input-perron" name="input-user" placeholder="User" required=""><br><br>

        <!-- Field de password-->
        <label>Contraseña</label><br>
        <input type="password" id="password" name="input-pass" placeholder="Password" required=""> 
        <br><br> 

         <!-- Field de rol-->
        <label>Rol</label><br>
        <select id="rol" name="input-rol" required="">
            <option value="" disabled selected>Selecciona un rol</option>
            <option value="admin">admin</option>
            <option value="empleado">empleado</option>
        </select>
        <br><br> 

        <!-- Botón-->
        <button type="submit">Registrar</button>


        </form>
        <!-- Fin del formulario-->

    </section>

</section>
<footer>



</footer>


<!-- -->

</body>
</html>
