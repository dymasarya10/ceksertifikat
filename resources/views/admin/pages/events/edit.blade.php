@extends('admin.templates.layout')

@section('adminsection')
    <p class="fs-5">Edit Data Siswa</p>
    <form action='/event/put/{{ $event->id }}' method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kode Event</label>
            <input type="text" class="form-control @error('id')
            is-invalid
        @enderror"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $event->id }}" name="id">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Event</label>
            <input type="text" class="form-control
            @error('name')
            is-invalid
        @enderror"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $event->name }}" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ketua Pelaksana</label>
            <input type="text" class="form-control
            @error('event_leader')
            is-invalid
        @enderror"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $event->event_leader }}" name="event_leader">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Penanggung Jawab</label>
            <input type="text" class="form-control
            @error('event_comissioner')
            is-invalid
        @enderror"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $event->event_comissioner }}" name="event_comissioner">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal Pelaksanaan</label>
            <input type="date" class="form-control
            @error('date')
            is-invalid
        @enderror"
                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $event->date }}" name="date">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
