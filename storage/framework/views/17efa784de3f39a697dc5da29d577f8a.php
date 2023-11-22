<?php $__env->startSection('frontsection'); ?>

    <h4 class="h4 text-center mb-3">Apa yang mau anda Verifikasi ?</h4>
    <div class="row row-cols-2">
        <a class="col text-decoration-none text-black" href="/front/charter">
            <div class="col d-flex justify-content-center align-items-center ">
                <div class="bg-white min-height-3-rem container-fluid rounded-4 shadow-lg mb-4 p-4">
                    <img src="<?php echo e(asset('assets/front/img/PIAGAM.svg')); ?>" alt="" class="img-fluid">
                    <p class="fs-7 text-center fw-bold">PIAGAM</p>
                </div>
            </div>
        </a>
        <a class="col text-decoration-none text-black" href="">
            <div class="col d-flex justify-content-center align-items-center ">
                <div class="bg-white min-height-3-rem container-fluid rounded-4 shadow-lg mb-4 p-4">
                    <img src="<?php echo e(asset('assets/front/img/CERTIF.svg')); ?>" alt="" class="img-fluid">
                    <p class="fs-7 text-center fw-bold">SERTIFIKAT</p>
                </div>
            </div>
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.templates.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ceksertifikat\resources\views/front/pages/home.blade.php ENDPATH**/ ?>