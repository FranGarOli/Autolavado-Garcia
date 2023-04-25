<?php $__env->startSection('titulo', 'Autolavado García'); ?>
<?php $__env->startSection('cuerpo'); ?>
<main>
    <div class="contenedor-login">
        <h1>Inicio de sesión.</h1>

        <form class="formulario" action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="campos-formulario">
                <label for="username">Nombre de usuario: </label>
                <input type="text" name="username" id="username" value="fran">
            </div>

            <div class="campos-formulario">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" value="fran">
            </div>

            <div class="btn-formulario">
                <input type="submit" name="login" value="Acceder">
            </div>
        </form>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fran_\autolavadoGarcia\resources\views/back/login.blade.php ENDPATH**/ ?>