@extends('front.templates.body')

@section('frontsection')
    <div class="container-fluid min-height-3-rem">
        @if ($auth === 'certified')
            <div class="container text-center p-0">
                <img src="{{ asset('assets/front/img/certified.svg') }}" alt="" class="img-fluid" width="15%"
                    style="position: absolute">
                {{-- position-absolute top-0 start-0 translate-middle => pinggir atas --}}
                {{-- position-absolute top-50 start-50 translate-middle => Tengah --}}
                @foreach ($charter as $item)
                    <img src="{{ asset('storage/' . $item->path) }}" alt="" class="img-fluid">
                @endforeach
            </div>
        @else
            <p class="display-5 text-center">{{ $message }}</p>
        @endif
    </div>

    <div class="container-fluid text-center mt-4">
        <a href="/" class="btn btn-success text-center">OK</a>
    </div>
@endsection
