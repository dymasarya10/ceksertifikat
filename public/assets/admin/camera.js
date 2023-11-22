let code = document.getElementById('codeg')
function onScanSuccess(decodedText, decodedResult)
{
    // Handle on success condition with the decoded text or result.
    code.value = decodedText;
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
        fps: 10,
        qrbox: 250
    });
html5QrcodeScanner.render(onScanSuccess);

function showBtn()
{
    let btn = document.querySelector('.submit');
    btn.classList.remove('d-none');
    btn.classList.add('d-block');
}
