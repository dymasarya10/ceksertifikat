@extends('front.templates.body')
@section('frontsection')
    @if ($collection->count())
    <div class="row row-cols-3">
        <div class="col">
            <p>Jumlah : {{ $collection->count() }}</p>
        </div>
    </div>
    <div class="container-fluid">
        @foreach ($collection as $item)
            <div class="container-fluid position-relative text-center">
                <div class="position-absolute text-center" style="margin-top: 30%;">
                    <h3 class="h3 fw-bold text-black">Sertifikat anda
                        terverifikasi</h3>
                </div>
                <img src="{{ asset('storage/' . $item->path) }}" alt="" class="img-fluid mb-5">
            </div>
        @endforeach
    </div>
    @else
    <div class="container-fluid">
        <h3 class="h3 text-danger text-center">Maaf Data Tidak Ditemukan</h3>
    </div>
    @endif
    <div class="container-fluid text-center">
        <a href="{{ route('home') }}" class="btn btn-success text-center">Back</a>
    </div>
@endsection
