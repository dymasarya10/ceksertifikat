<?php $__env->startSection('frontsection'); ?>
    <div class="container-fluid min-height-3-rem">
        <?php if($auth === 'certified'): ?>
            <div class="container text-center p-0">
                <img src="<?php echo e(asset('assets/front/img/certified.svg')); ?>" alt="" class="img-fluid" width="15%"
                    style="position: absolute">
                
                
                <?php $__currentLoopData = $charter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(asset('storage/' . $item->path)); ?>" alt="" class="img-fluid">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <p class="display-5 text-center">Piagam Tidak Ditemukan</p>
        <?php endif; ?>
    </div>

    <div class="container-fluid text-center mt-4">
        <a href="/" class="btn btn-success text-center">OK</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.templates.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ceksertifikat\resources\views/front/pages/certified/certified.blade.php ENDPATH**/ ?>