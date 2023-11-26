<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Kode Piagam</th>
                    <th>Kode Barcode</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($item->student->name); ?></td>
                        <td><?php echo e($item->student->id); ?></td>
                        <td><?php echo e($item->serial_number); ?></td>
                        <td><?php echo e(Crypt::encrypt($item->serial_number)); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
</body>

</html>
<?php /**PATH C:\laragon\www\ceksertifikat\resources\views/exportsbarcode.blade.php ENDPATH**/ ?>