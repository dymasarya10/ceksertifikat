@extends('admin.templates.layout')

@section('adminsection')
    <p class="fs-6">Tambahkan data event</p>
    <form action="{{ route('storeevt') }}" method="POST" class="pe-5">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kode Event</label>
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
            <label for="exampleInputPassword1" class="form-label">Nama Event</label>
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
            <label for="exampleInputPassword1" class="form-label">Ketua Pelaksana</label>
            <input type="text" class="form-control  @error('event_leader')
            is-invalid
            @enderror"
                id="exampleInputPassword1" name="event_leader" required value="{{ old('event_leader') }}">
            @error('event_leader')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Penanggung Jawab</label>
            <input type="text" class="form-control  @error('event_comissioner')
            is-invalid
            @enderror"
                id="exampleInputPassword1" name="event_comissioner" required value="{{ old('event_comissioner') }}">
            @error('event_comissioner')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tanggal</label>
            <input type="date" class="form-control  @error('date')
            is-invalid
            @enderror"
                id="exampleInputPassword1" name="date" required value="{{ old('date') }}">
            @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Buat</button>
    </form>
@endsection
