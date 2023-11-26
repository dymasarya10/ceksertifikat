@extends('admin.templates.layout')

@section('adminsection')
    <p class="fs-6">Berikut adalah data event Sekolah Labitech Jakarta</p>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 mb-4" method="GET" action="/event">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Cari Nama..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" name="s" value="{{ request('s') }}" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="overflow-x-auto">
        <a href="{{ route('createevt') }}" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i> Tambah</a>
        @if ($collection->count())
        <table class="table table-hover table-bordered table-sm table-responsive">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Event</th>
                    <th scope="col">Nama Event</th>
                    <th scope="col">Ketua Pelaksana</th>
                    <th scope="col">Penanggung Jawab</th>
                    <th scope="col">Tanggal Pelaksanaan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($collection as $item)
                        <tr>
                            <th scope="row">
                                {{ $loop->iteration + $collection->perPage() * ($collection->currentPage() - 1) }}</th>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->event_leader }}</td>
                            <td>{{ $item->event_comissioner }}</td>
                            <td>{{ date('l', strtotime($item->date)) . ', ' . date('d M Y', strtotime($item->date)) }}</td>
                            <td class="d-flex">
                                <a href="/adm/event/edit/{{ $item->id }}" class="btn btn-warning btn-sm"><i
                                    class="fa-solid fa-pencil"></i></a>
                                <form action="{{ route('destroyevt') }}" method="POST" class="px-1">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" name="target">
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah anda yakin ?')"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center fs-4">
            No Post Found
        </div>
        @endif
    </div>
    {{ $collection->links() }}
@endsection
