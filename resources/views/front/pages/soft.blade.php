@extends('front.templates.body')
@section('frontsection')
    @if ($collection->count())
        <div class="row row-cols-2 mb-2">
            <div class="col">
                <p>Jumlah : {{ $collection->count() }}</p>
            </div>
            <div class="col text-end">

            </div>
        </div>
        @foreach ($collection as $item)
            <div class="bg-white shadow-lg rounded-4 mb-3 p-3">
                <div class="row">
                    <div class="col-8">
                        <p>{{ $item->event }}</p>
                    </div>
                    <div class="col-4">
                        <form action="{{ route('downloadFile') }}">
                            <input type="hidden" value="{{ $item->path }}" name="path">
                            <button class="btn btn-info" type="submit">Unduh</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="container-fluid">
            <h3 class="h3 text-danger text-center">Maaf Data Tidak Ditemukan</h3>
        </div>
    @endif
    <div class="container-fluid text-center">
        <a href="{{ route('home') }}" class="btn btn-success text-center">Back</a>
    </div>
@endsection
