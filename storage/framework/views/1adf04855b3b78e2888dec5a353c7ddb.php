<?php $__env->startSection('adminsection'); ?>
    <p class="fs-6">Berikut adalah data piagam anak Sekolah Labitech Jakarta</p>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 mb-4" method="GET" action="/charter">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Cari NISN..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" name="s" value="<?php echo e(request('s')); ?>" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <div class="table-responsive">
        <?php if($collection->count()): ?>
            <table class="table table-hover table-bordered table-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Acara</th>
                        <th scope="col">Kode Piagam</th>
                        <th scope="col">Penanggung Jawab</th>
                        <th scope="col">Ketua Pelaksana</th>
                        <th scope="col">Tanggal Pelaksanaan</th>
                        <th scope="col">File</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row">
                                <?php echo e($loop->iteration + $collection->perPage() * ($collection->currentPage() - 1)); ?>

                            </th>
                            <td><?php echo e($item->student->id ?? 'NONE'); ?></td>
                            <td><?php echo e($item->student->name ?? 'NONE'); ?></td>
                            <td><?php echo e($item->event->name); ?></td>
                            <td><?php echo e($item->serial_number); ?></td>
                            <td><?php echo e($item->event->event_comissioner); ?></td>
                            <td><?php echo e($item->event->event_leader); ?></td>
                            <td><?php echo e(date('l', strtotime($item->event->date)) . ', ' . date('d M Y', strtotime($item->event->date))); ?></td>
                            <td><a href="<?php echo e(route('download', ['filename' => $item->path])); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-export"></i></a></td>
                            <td class="d-flex">
                                <a href="/charter/edit/<?php echo e($item->serial_number); ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                <form action="<?php echo e(route('destroydch')); ?>" method="POST" class="px-1">
                                    <?php echo method_field('delete'); ?>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($item->serial_number); ?>" name="target">
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah anda yakin ?')"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="text-center fs-4">
                No Post Found
            </div>
        <?php endif; ?>
    </div>
    <?php echo e($collection->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.templates.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ceksertifikat\resources\views/admin/pages/charters/charters.blade.php ENDPATH**/ ?>