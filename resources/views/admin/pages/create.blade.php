@extends('admin.templates.body')
@section('adminsection')
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!! session('error') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{ route('storedata') }}" method="POST" class="pe-5" enctype="multipart/form-data" class="pb-4">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nomor Identitas</label>
            <input type="text" class="form-control  @error('identity_number')
        is-invalid
        @enderror"
                id="exampleInputPassword1" name="identity_number" required value="{{ old('identity_number') }}">
            @error('identity_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama</label>
            <input type="text" class="form-control  @error('name')
        is-invalid
        @enderror"
                id="exampleInputPassword1" name="name" required value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Kode Barcode</label>
            <input type="text" class="form-control  @error('barcode')
        is-invalid
        @enderror"
                id="exampleInputPassword1" name="barcode" required value="{{ old('barcode') }}">
            @error('barcode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tipe Sertifikat</label>
            <select class="form-select" aria-label="Default select example" name="type">
                <option value="-"> Pilih Tipe Sertifikat </option>
                <option value="PIAGAM"> PIAGAM </option>
                <option value="SERTIFIKAT"> SERTIFIKAT </option>
            </select>
            @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama Acara</label>
            <input type="text" class="form-control  @error('event')
        is-invalid
        @enderror"
                id="exampleInputPassword1" name="event" required value="{{ old('event') }}">
            @error('event')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Masukkan File Sertifikat</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control @error('path')
        is-invalid
        @enderror"
                    accept=".png" id="inputGroupFile02" name="path" required>
                @error('path')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-2 mb-3">Buat</button>
        <a href="/" class="btn btn-danger mt-2 mb-3">Batal</a>
    </form>
@endsection
