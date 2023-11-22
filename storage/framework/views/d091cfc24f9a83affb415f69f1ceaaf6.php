<?php $__env->startSection('adminsection'); ?>
    <p class="fs-6">Berikut adalah data event Sekolah Labitech Jakarta</p>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 mb-4" method="GET" action="/event">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Cari Nama..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" name="s" value="<?php echo e(request('s')); ?>" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <div class="overflow-x-auto">
        <a href="" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i> Tambah</a>
        <?php if($collection->count()): ?>
        <table class="table table-hover table-bordered table-sm table-responsive">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Event</th>
                    <th scope="col">Nama Event</th>
                    <th scope="col">Ketua Pelaksana</th>
                    <th scope="col">Penanggung Jawab</th>
                    <th scope="col">Tanggal Pelaksanaan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                    <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row">
                                <?php echo e($loop->iteration + $collection->perPage() * ($collection->currentPage() - 1)); ?></th>
                            <td><?php echo e($item->id); ?></td>
                            <td><?php echo e($item->name); ?></td>
                            <td><?php echo e($item->event_leader); ?></td>
                            <td><?php echo e($item->event_comissioner); ?></td>
                            <td><?php echo e(date('l', strtotime($item->date)) . ', ' . date('d M Y', strtotime($item->date))); ?></td>
                            <td class="d-flex">
                                <form action="/event/edit" method="POST" class="px-1">
                                    <?php echo method_field('delete'); ?>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($item->id); ?>" name="target">
                                    <button type="submit" class="btn btn-warning"><i
                                            class="fa-solid fa-pencil"></i></button>
                                </form>
                                <form action="<?php echo e(route('destroyevn')); ?>" method="POST" class="px-1">
                                    <?php echo method_field('delete'); ?>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($item->id); ?>" name="target">
                                    <button type="submit" class="btn btn-danger"
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

<?php echo $__env->make('admin.templates.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ceksertifikat\resources\views/admin/pages/events/events.blade.php ENDPATH**/ ?>