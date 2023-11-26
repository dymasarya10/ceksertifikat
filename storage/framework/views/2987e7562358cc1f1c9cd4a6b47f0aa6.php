<?php $__env->startSection('adminsection'); ?>
    <p class="fs-5">Edit Data Siswa</p>
    <form action='/event/put/<?php echo e($event->id); ?>' method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kode Event</label>
            <input type="text" class="form-control <?php $__errorArgs = ['id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            is-invalid
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo e($event->id); ?>" name="id">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Event</label>
            <input type="text" class="form-control
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            is-invalid
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo e($event->name); ?>" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ketua Pelaksana</label>
            <input type="text" class="form-control
            <?php $__errorArgs = ['event_leader'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            is-invalid
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo e($event->event_leader); ?>" name="event_leader">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Penanggung Jawab</label>
            <input type="text" class="form-control
            <?php $__errorArgs = ['event_comissioner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            is-invalid
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo e($event->event_comissioner); ?>" name="event_comissioner">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal Pelaksanaan</label>
            <input type="date" class="form-control
            <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            is-invalid
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo e($event->date); ?>" name="date">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.templates.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ceksertifikat\resources\views/admin/pages/events/edit.blade.php ENDPATH**/ ?>