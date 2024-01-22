<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Operation</div>
                <a class="nav-link {{ ($header === 'Data Sertifikat') ? 'active' : '' }}" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file-circle-plus"></i></div>
                    Data Sertifikat
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->name }}
        </div>
    </nav>
</div>
