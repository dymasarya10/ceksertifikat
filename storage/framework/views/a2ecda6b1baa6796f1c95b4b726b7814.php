<?php $__env->startSection('adminsection'); ?>
    <p class="fs-5">Edit Data Piagam</p>
    <form action='/charter/put/<?php echo e($collection->id); ?>' method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kode Piagam</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo e($collection->serial_number); ?>" name="target">
            <div id="emailHelp" class="form-text">Pastikan Kode Benar !!</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.templates.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ceksertifikat\resources\views/admin/pages/charters/chartersedit.blade.php ENDPATH**/ ?>