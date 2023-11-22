<?php echo $__env->make('front.templates.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="bg-body-tertiary">

    <?php echo $__env->make('front.partials.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('front.partials.heading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid px-md-5">
        
        <?php echo $__env->yieldContent('frontsection'); ?>
    </div>

    <?php echo $__env->make('front.templates.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\laragon\www\ceksertifikat\resources\views/front/templates/body.blade.php ENDPATH**/ ?>