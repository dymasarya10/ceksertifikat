 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg bg-white py-0 px-md-5 border-bottom fs-7">
     <div class="container-fluid">
         <a class="navbar-brand" href="#">
             <img src="<?php echo e(asset('assets/front/img/logo lab.png')); ?>" alt="Bootstrap" width="50" height="50">
             Cek Sertifikat
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
             aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse px-md-4 px-2" id="navbarNavAltMarkup">
             <div class="navbar-nav">
                 <a class="nav-link <?php echo e(($heading === '' ? 'border-success border-bottom active ' : '' )); ?> me-lg-5 min-height-3-em min-height-phone-3-em d-lg-flex justify-content-center align-items-center mb-md-0 mb-2"
                     aria-current="page" href="<?php echo e(route('home')); ?>">Beranda</a>
                 <a class="nav-link <?php echo e(($heading === 'Cari Data Piagam' ? 'border-success border-bottom active ' : '' )); ?> me-lg-5 min-height-3-em min-height-phone-3-em d-lg-flex justify-content-center align-items-center mb-md-0 mb-2"
                     href="<?php echo e(route('frontcharter')); ?>">Cek Piagam</a>
                 <a class="nav-link <?php echo e(($heading === 'Cari Data Sertifikat' ? 'border-success border-bottom active ' : '' )); ?> me-lg-5 min-height-3-em min-height-phone-3-em d-lg-flex justify-content-center align-items-center mb-md-0 mb-2"
                     href="pages.html">Cek Sertifikat</a>
             </div>
         </div>
     </div>
 </nav>
<?php /**PATH C:\laragon\www\ceksertifikat\resources\views/front/partials/navigation.blade.php ENDPATH**/ ?>