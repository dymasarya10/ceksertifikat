<?php $__env->startSection('adminsection'); ?>
    <p class="fs-6">Berikut adalah data sertifikat anak Sekolah Labitech Jakarta</p>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 mb-4" method="GET" action="/adm/certificate">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Cari NISN..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" name="s" value="<?php echo e(request('s')); ?>" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="overflow-x-auto">
        <a href="<?php echo e(route('createcrt')); ?>" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i> Tambah</a>
        <?php if($collection->count()): ?>
        <a href="<?php echo e(route('exportcrt')); ?>" class="btn btn-success mb-3"><i class="fa-solid fa-file-export"></i> Ambil Data QR</a>
        <?php endif; ?>
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
                                <td><?php echo e(date('l', strtotime($item->event->date)) . ', ' . date('d M Y', strtotime($item->event->date))); ?>

                                </td>
                                <td>
                                    <form action="<?php echo e(route('downloadcrt')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" value="<?php echo e($item->path); ?>" name="path">
                                        <button type="submit" class="btn btn-primary btn-sm"><i
                                                class="fa-solid fa-file-export"></i></button>
                                    </form>
                                </td>
                                <td class="d-flex">
                                    
                                    <form action="<?php echo e(route('destroycrt')); ?>" method="POST" class="px-1">
                                        <?php echo method_field('delete'); ?>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" value="<?php echo e($item->serial_number); ?>" name="target">
                                        <input type="hidden" value="<?php echo e($item->path); ?>" name="path">
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin ?')"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($collection->links()); ?>

            <?php else: ?>
                <div class="text-center fs-4">
                    No Data Found
                </div>
            <?php endif; ?>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.templates.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ceksertifikat\resources\views/admin/pages/certificate/certificates.blade.php ENDPATH**/ ?>