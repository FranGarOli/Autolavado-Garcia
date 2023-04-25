<?php $__env->startSection('titulo', 'Autolavado García'); ?>
<?php $__env->startSection('cuerpo'); ?>
<main>
    <div class="registros">
        <?php $__empty_1 = true; $__currentLoopData = $registers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="register-card">
                    <h5 class="card-title"><?php echo e($registro->client->name); ?></h5>

                    <p>Total: <?php echo e($registro->total); ?>€</p>
                    <select class="btn btn-primary">
                        <option selected><?php echo e($registro->status); ?></option>
                        <option>En progreso</option>
                        <option>Pagado</option>
                    </select>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No existen registros...</p>
        <?php endif; ?>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutback', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fran_\autolavadoGarcia\resources\views/back/index.blade.php ENDPATH**/ ?>