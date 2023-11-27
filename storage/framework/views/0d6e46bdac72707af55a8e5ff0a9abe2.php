<?php $__env->startSection('frontsection'); ?>
    <div class="row justify-content-center row-cols-1">
        <div class="col-12 text-decoration-none text-black">
            <div class="col d-flex justify-content-center align-items-center ">
                <div class="bg-white min-height-3-rem container-fluid rounded-4 shadow-lg mb-4 p-4">
                    <p class="h5 text-center">Cari Berdasarkan NISN</p>
                    <form class="" method="GET" action="/front/certificate">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Cari NISN..." aria-label="Search for..."
                                aria-describedby="btnNavbarSearch" name="s" value="<?php echo e(request('s')); ?>" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="submit" name="submit"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if(isset($_GET['submit']) && $_GET['s'] != ''): ?>
            <div class="col-12">
                <?php if($collection->count()): ?>
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="bg-white min-height-3-rem container-fluid rounded-4 shadow-lg mb-4 p-4">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered table-hover fs-6">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NISN</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Acara</th>
                                            <th scope="col">Tanggal Pelaksanaan</th>
                                            <th scope="col">File</th>
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
                                                <td><?php echo e($item->event->name ?? 'NONE'); ?></td>
                                                <td><?php echo e($item->event->date ?? 'NONE'); ?></td>
                                                <td>
                                                    <form action="<?php echo e(route('download')); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" value="<?php echo e($item->path); ?>" name="path">
                                                        <button type="submit" class="btn btn-primary btn-sm"><i
                                                                class="fa-solid fa-file-export"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($collection->links()); ?>

                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <p class="h5 text-danger">No Data Found !</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <a class="col text-decoration-none text-black" href="/front/certificate/scancrt">
            <div class="col d-flex justify-content-center align-items-center ">
                <div class="bg-white text-center min-height-3-rem container-fluid rounded-4 shadow-lg mb-4 p-4">
                    <img src="<?php echo e(asset('assets/front/img/BARCODE.svg')); ?>" alt=""
                        class="img-fluid w-75 text-center">
                    <p class="fs-7 fw-bold">SCAN BARCODE</p>
                </div>
            </div>
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.templates.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ceksertifikat\resources\views/front/pages/certificate.blade.php ENDPATH**/ ?>