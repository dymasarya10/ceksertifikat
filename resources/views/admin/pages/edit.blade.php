@extends('admin.templates.body')
@section('adminsection')
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!! session('error') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="/adm/put/{{ $collection->id }}" method="POST" class="pe-5" enctype="multipart/form-data" class="pb-4">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nomor Identitas</label>
            <input type="text" class="form-control  @error('identity_number')
        is-invalid
        @enderror"
                id="exampleInputPassword1" name="identity_number" required value="{{ $collection->identity_number }}">
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
                id="exampleInputPassword1" name="name" required value="{{ $collection->name }}">
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
                id="exampleInputPassword1" name="barcode" required value="{{ $collection->barcode }}">
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
                <option value="PIAGAM" {{ ($collection->type === 'PIAGAM') ? 'selected' : ''}}> PIAGAM </option>
                <option value="SERTIFIKAT" {{ ($collection->type === 'SERTIFIKAT') ? 'selected' : ''}}> SERTIFIKAT </option>
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
                id="exampleInputPassword1" name="event" required value="{{ $collection->event }}">
            @error('event')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            @if ($collection->path)
            <img src="{{ asset('storage/'.$collection->path) }}" alt="" class="img-fluid" width="30%">
            @else
            <h3 class="h3">None</h3>
            @endif
            <p>Gambar Lama</p>
            <label for="exampleInputPassword1" class="form-label">Masukkan File Sertifikat Baru</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control @error('path')
        is-invalid
        @enderror"
                    accept=".png" id="inputGroupFile02" name="path">
                @error('path')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <input type="hidden" value="{{ $collection->path }}" name="target">
        <button type="submit" class="btn btn-warning mt-2 mb-3 text-white">Edit</button>
        <a href="/" class="btn btn-danger mt-2 mb-3">Batal</a>
    </form>
@endsection
