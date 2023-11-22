@extends('front.templates.body')

@section('frontsection')
    <div class="row">
        <div class="col">
            <div class="col d-flex justify-content-center align-items-center ">
                <div class="bg-white min-height-3-rem container-fluid rounded-4 shadow-lg mb-4 p-4">
                    <h4 class="h4 text-center">Scan Disini</h4>
                    <div id="cmr" class="container d-flex justify-content-center mt-5">
                        <div id="reader" class="w-100"></div>
                    </div>
                    <form action="{{ route('checkdata') }}" method="post" id="myForm">
                        @csrf
                        <input type="hidden" name="code" id="codeg">
                        <button type="submit" name="submit" class="d-none" id="button">CEK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('node_modules/html5-qrcode/html5-qrcode.min.js') }}"></script>
    <script>
        let code = document.getElementById('codeg');
        const button = document.getElementById('button');
        const reader = document.getElementById('cmr');

        function onScanSuccess(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            code.value = decodedText;
            html5QrcodeScanner.clear();
            button.click();
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            }
            );
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@endsection
