@include('front.templates.head')

<body>
    <div id="cmr" class="container-fluid d-flex justify-content-center border border-danger mt-5">
        <div id="reader" class="w-75"></div>
    </div>
    <form action="{{ route('checkdata') }}" method="post" id="myForm">
        @csrf
        <input type="text" name="code" id="codeg">
        <button type="submit" name="submit" class="d-none" id="button">CEK</button>
    </form>
    <script src="{{ asset('node_modules/html5-qrcode/html5-qrcode.min.js') }}"></script>
    <script>
        let code = document.getElementById('codeg');
        const button = document.getElementById('button');
        const reader = document.getElementById('cmr');

        function onScanSuccess(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            code.value = decodedText;
            button.click();
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
    @include('front.templates.foot')
