@extends('admin.templates.layout')

@section('adminsection')
    <p class="fs-6">Tambahkan data siswa</p>
    <form action="{{ route('storestd') }}" method="POST" class="pe-5">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NISN</label>
            <input type="text" class="form-control @error('id')
                is-invalid
            @enderror"
                id="exampleInputEmail1" aria-describedby="emailHelp" name="id" required value="{{ old('id') }}">
            @error('id')
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
        <button type="submit" class="btn btn-success">Buat</button>
    </form>
@endsection
