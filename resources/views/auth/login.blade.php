@include('admin.templates.head')

<body class="bg-success">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content" class="mt-5">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('auth') }}" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input
                                                class="form-control @error('email')
                                                is-invalid
                                            @enderror"
                                                id="inputEmail" type="email" placeholder="name@example.com"
                                                name="email" required />
                                            <label for="inputEmail">Username</label>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password"
                                                placeholder="Password" name="password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>

                                    @if (session()->has('loginError'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('loginError') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Dymas Aziz Team</div>
                        <div class="text-muted text-center">
                            <p>Special Thanks to</p>
                            <p>EwiGarden</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('admin.templates.foot')
