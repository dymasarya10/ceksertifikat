@extends('admin.templates.layout')

@section('adminsection')
    <p class="fs-6">Berikut adalah data piagam anak Sekolah Labitech Jakarta</p>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 mb-4" method="GET" action="/charter">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Cari NISN..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" name="s" value="{{ request('s') }}" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <div class="table-responsive">
        @if ($collection->count())
            <table class="table table-hover table-bordered table-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Acara</th>
                        <th scope="col">Kode Piagam</th>
                        <th scope="col">Penanggung Jawab</th>
                        <th scope="col">Ketua Pelaksana</th>
                        <th scope="col">Tanggal Pelaksanaan</th>
                        <th scope="col">File</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                        <tr>
                            <th scope="row">
                                {{ $loop->iteration + $collection->perPage() * ($collection->currentPage() - 1) }}
                            </th>
                            <td>{{ $item->student->id ?? 'NONE' }}</td>
                            <td>{{ $item->student->name ?? 'NONE' }}</td>
                            <td>{{ $item->event->name }}</td>
                            <td>{{ $item->serial_number }}</td>
                            <td>{{ $item->event->event_comissioner }}</td>
                            <td>{{ $item->event->event_leader }}</td>
                            <td>{{ date('l', strtotime($item->event->date)) . ', ' . date('d M Y', strtotime($item->event->date)) }}</td>
                            <td><a href="{{ route('download', ['filename' => $item->path]) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-export"></i></a></td>
                            <td class="d-flex">
                                <a href="/charter/edit/{{ $item->serial_number }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                <form action="{{ route('destroydch') }}" method="POST" class="px-1">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" value="{{ $item->serial_number }}" name="target">
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
