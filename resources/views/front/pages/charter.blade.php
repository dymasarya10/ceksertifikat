@extends('front.templates.body')

@section('frontsection')
    <div class="row justify-content-center row-cols-1">
        <div class="col-12 text-decoration-none text-black">
            <div class="col d-flex justify-content-center align-items-center ">
                <div class="bg-white min-height-3-rem container-fluid rounded-4 shadow-lg mb-4 p-4">
                    <p class="h5 text-center">Cari Berdasarkan NISN</p>
                    <form class="" method="GET" action="/front/charter">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Cari NISN..." aria-label="Search for..."
                                aria-describedby="btnNavbarSearch" name="s" value="{{ request('s') }}" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="submit" name="submit"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if (isset($_GET['submit']) && $_GET['s'] != '')
            <div class="col-12">
                @if ($collection->count())
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="bg-white min-height-3-rem container-fluid rounded-4 shadow-lg mb-4 p-4">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered table-hover fs-6">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NISN</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Acara</th>
                                            <th scope="col">Tanggal Pelaksanaan</th>
                                            <th scope="col">File</th>
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
                                                <td>{{ $item->event->name ?? 'NONE' }}</td>
                                                <td>{{ $item->event->date ?? 'NONE' }}</td>
                                                <td><a href="{{ route('download', ['filename' => 'SAMPLE.pdf']) }}" class="btn btn-primary"><i class="fa-solid fa-file-export"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $collection->links() }}
                            </div>
                        </div>
                    </div>
        @else
        <p class="h5 text-danger">No Data Found !</p>
        @endif
        </div>
        @endif
        <a class="col text-decoration-none text-black" href="/front/charter/scancht">
            <div class="col d-flex justify-content-center align-items-center ">
                <div class="bg-white text-center min-height-3-rem container-fluid rounded-4 shadow-lg mb-4 p-4">
                    <img src="{{ asset('assets/front/img/BARCODE.svg') }}" alt="" class="img-fluid w-75 text-center">
                    <p class="fs-7 fw-bold">SCAN BARCODE</p>
                </div>
            </div>
        </a>
    </div>
@endsection
