<?php $__env->startSection('adminsection'); ?>
    <p class="fs-6">Berikut adalah data anak Sekolah Labitech Jakarta</p>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 mb-4" method="GET" action="/student">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Cari Nama..." aria-label="Search for..."
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
        <a href="<?php echo e(route('createstd')); ?>" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i> Tambah</a>
        <a href="" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                class="fa-solid fa-plus"></i> Import Excel</a>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan File Excel</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo e(route('exclstd')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file" required>
                                <button class="btn btn-outline-secondary" type="submit"
                                    id="inputGroupFileAddon04"><i class="fa-solid fa-upload"></i></button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <?php if($collection->count()): ?>
            <table class="table table-hover table-bordered table-sm table-responsive">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Nama</th>
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
                            <td class="d-flex">
                                <form action="/charters/edit" method="POST" class="px-1">
                                    <?php echo method_field('delete'); ?>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($item->id); ?>" name="target">
                                    <button type="submit" class="btn btn-warning"><i
                                            class="fa-solid fa-pencil"></i></button>
                                </form>
                                <form action="<?php echo e(route('destroystd')); ?>" method="POST" class="px-1">
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

<?php echo $__env->make('admin.templates.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ceksertifikat\resources\views/admin/pages/students.blade.php ENDPATH**/ ?>