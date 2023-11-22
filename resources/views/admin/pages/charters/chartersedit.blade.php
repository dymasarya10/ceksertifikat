@extends('admin.templates.layout')

@section('adminsection')
    <p class="fs-5">Edit Data Piagam</p>
    <form action='/charter/put/{{ $collection->id }}' method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kode Piagam</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $collection->serial_number }}" name="target">
            <div id="emailHelp" class="form-text">Pastikan Kode Benar !!</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
