@extends('admin.templates.layout')

@section('adminsection')
    <p class="fs-5">Edit Data Siswa</p>
    <form action='/student/put/{{ $student->id }}' method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NISN</label>
            <input type="text" class="form-control @error('id')
            is-invalid
        @enderror"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $student->id }}" name="id">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control
            @error('name')
            is-invalid
        @enderror"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $student->name }}" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
