@include('front.templates.head')

<body class="bg-body-tertiary">

    @include('front.partials.navigation')
    @include('front.partials.heading')

    <div class="container-fluid px-md-5">
        {{-- Main Content --}}
        @yield('frontsection')
    </div>

    @include('front.templates.foot')
