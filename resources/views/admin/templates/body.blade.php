@include('admin.templates.head')
<body class="sb-nav-fixed f-quicksands">
    @include('admin.partials.navigation')
    <div id="layoutSidenav">
        @include('admin.partials.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">{{ $header }}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">{{ $subheader }}</li>
                    </ol>
                    @yield('adminsection')
                </div>
            </main>
        </div>
    </div>
@include('admin.templates.footer')
