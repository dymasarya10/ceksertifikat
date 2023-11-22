<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{ ($header==='Dashboard' ? 'active' : '') }}" href="{{ route('homepage') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Home Page
                </a>
                <div class="sb-sidenav-menu-heading">Data</div>
                <a class="nav-link {{ ($header==='Data Siswa' ? 'active' : '') }}" href="{{route('student')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-graduate"></i></div>
                    Data Siswa
                </a>
                <a class="nav-link {{ ($header==='Data Sertifikat' ? 'active' : '') }}" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-certificate"></i></div>
                    Data Sertifikat
                </a>
                <a class="nav-link {{ ($header==='Data Piagam' ? 'active' : '') }}" href="{{ route('charter') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-scroll"></i></div>
                    Data Piagam
                </a>
                <a class="nav-link {{ ($header==='Data Event' ? 'active' : '') }}" href="{{ route('event') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-check"></i></div>
                    Data Event
                </a>
                <div class="sb-sidenav-menu-heading">Operation</div>
                <a class="nav-link collapsed {{ (($header==='Tambah Data Piagam'||$header==='Tambah Data Sertifikat') ? 'active' : '') }}" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Tambah Data
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Sertifikat</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Piagam</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Event</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
