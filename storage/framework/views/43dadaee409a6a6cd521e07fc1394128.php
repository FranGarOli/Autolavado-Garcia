<?php $__env->startSection('titulo', 'Autolavado García'); ?>

<?php $__env->startSection('cuerpo'); ?>
    <main>
        <div class="reservas">
            <h1>Reserva tu cita!</h1>
            <form class="formulario">
                <?php echo csrf_field(); ?>

                <div class="campos-formulario">
                    <label for="name">Nombre completo: </label>
                    <input type="text" name="name" id="name">
                </div>

                <div class="campos-formulario">
                    <label for="dni">DNI: </label>
                    <input type="text" name="dni" id="dni">
                </div>

                <div class="campos-formulario">
                    <label for="phone">Teléfono: </label>
                    <input type="text" name="phone" id="phone">
                </div>

                <div class="campos-formulario">
                    <label for="email">Correo electrónico: </label>
                    <input type="email" name="email" id="email">
                </div>

                <div class="campos-formulario">
                    <label for="service">Servicio a realizar: </label>
                    <select name="service" id="service">
                        <option value="op1">Servicio interior y exterior sin llantas</option>
                        <option value="op2">Servicio interior y exterior con llantas y cristales</option>
                        <option value="ta1">Tapicería completa</option>
                    </select>
                </div>

                <div class="btn-formulario">
                    <input type="submit" name="book" value="Reservar">
                </div>
            </form>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fran_\autolavadoGarcia\resources\views/front/bookings.blade.php ENDPATH**/ ?>