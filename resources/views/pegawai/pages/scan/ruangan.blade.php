@extends('pegawai.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Scan Ruangan</h3>
                <div style="width: 100%" id="reader"></div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"
        integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            alert(`Scan result: ${decodedText}`, decodedResult);
            $.ajax({
                url: '{{ route('pegawai.scan.ruangan.store') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id_ruang: decodedText,
                },
                success: function(response) {
                    console.log(response);
                    alert(response.message);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('gagal');
                }
            });
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 150,
                supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@endpush
