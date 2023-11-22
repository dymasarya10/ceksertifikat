@include('admin.templates.head')

<body class="sb-nav-fixed">
    @include('admin.partials.topbar')
    <div id="layoutSidenav">
        @include('admin.partials.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">{{ $header }}</h1>
                </div>
                <div class="container-fluid px-4">
                    @yield('adminsection')
                </div>
            </main>
            @include('admin.partials.footer')
        </div>
    </div>
    @include('admin.templates.foot')
