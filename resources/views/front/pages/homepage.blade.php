@extends('front.templates.body')
@section('frontsection')
    <div class="container mt-4 shadow-lg bg-white rounded-4 text-center py-3">
        <form action="{{ route('checkdata') }}" method="GET">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="fw-bold form-label">Cek Sertifikat</label>
                <input required name="target" type="text" class="form-control rounded-4" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value="{{ ($value==='') ? old('target') : $value }}">
            </div>
            <button class="w-100 btn btn-success rounded-4 mb-2" name="button" value="{{ Crypt::encrypt('cek') }}">Cek</button>
            <button class="w-100 btn btn-primary rounded-4 text-white"name="button" value="{{ Crypt::encrypt('soft') }}">Soft File</button>
        </form>
    </div>
    <div class="container mt-4 mb-2 shadow-lg bg-white rounded-4 text-center py-3 d-md-none">
        <p class="fw-bold">Scan QR</p>
        <a href="{{ route('scan') }}">
            <div class="container-fluid">
                <img src="{{ asset('assets/front/img/qr.png') }}" alt="" class="img-fluid w-50">
            </div>
        </a>
    </div>


    <div class="container-fluid d-none d-lg-block pt-3 text-center">
        <a href="{{ route('login') }}" class="btn btn-primary">
            Login Operator
        </a>
    </div>
@endsection
