@extends('admin.templates.body')
@section('adminsection')
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 mb-4" method="GET" action="">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Cari Nomor Identitas..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" name="s" value="{{ request('s') }}" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <br>
    <div class="container-fluid py-3 px-0">
        <a href="{{ route('createdata') }}" class="btn btn-primary text-white"><i class="fa-solid fa-plus"></i> Tambah</a>
        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                class="fa-solid fa-file"></i> Import Excel</a>
    </div>
    {{-- MODAL --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan File Excel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('importdatawithExc') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file" required
                                accept=".xlsx">
                            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04"><i
                                    class="fa-solid fa-upload"></i></button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- MODAL --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-responsive table-sm table-bordered">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Identitas</th>
                <th scope="col">Nama</th>
                <th scope="col">Kode Barcode</th>
                <th scope="col">Tipe</th>
                <th scope="col">Nama Acara</th>
                <th scope="col">File</th>
                <th scope="col">Aksi</th>
                {{-- <th scope="col">Gambar</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration + $collection->perPage() * ($collection->currentPage() - 1) }}
                    </th>
                    <td>{{ $item->identity_number }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->barcode }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->event }}</td>
                    <td class="text-center">
                        <img src="{{ asset('storage/' . $item->path) }}" alt="" class="img-fluid" width="40%">
                    </td>
                    <td class="d-flex">
                        <a href="/adm/edit/{{ $item->id }}" class="btn btn-warning btn-sm me-1"><i class="fa-solid fa-pencil"></i></a>
                        <form action="{{ route('destroydata') }}" method="POST" class="px-1">
                            @method('delete')
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="target">
                            <input type="hidden" value="{{ $item->path }}" name="path">
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah anda yakin ?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $collection->links() }}
@endsection
