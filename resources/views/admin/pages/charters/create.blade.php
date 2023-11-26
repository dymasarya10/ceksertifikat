@extends('admin.templates.layout')

@section('adminsection')
    <p class="fs-6">Tambahkan data piagam</p>
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!! session('error') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{ route('storedch') }}" method="POST" class="pe-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">NISN</label>
            <input type="text" class="form-control  @error('student_id')
            is-invalid
            @enderror"
                id="exampleInputPassword1" name="student_id" required value="{{ old('student_id') }}">
            @error('student_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama Acara</label>
            <select class="form-select" aria-label="Default select example" name="event_id">
                @foreach ($collection as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="serial_number" value="J891bsjgxjsp01">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Masukkan Gambar</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control @error('path')
            is-invalid
            @enderror"
                    accept=".png" id="inputGroupFile02" name="path" required>
                @error('pdf')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">Buat</button>
    </form>
@endsection
