@include('front.templates.head')
<!-- Body -->

<body class="f-quicksands" style="background-color: #ECECEC;">
    <!-- Header -->
    @include('front.partials.header')
    <!-- Header -->


    <!-- Contain -->
    <div class="container-fluid py-3 px-3">
        @yield('frontsection')
    </div>
    <!-- Contain -->



    <!-- Body -->
    @include('front.templates.footer')
