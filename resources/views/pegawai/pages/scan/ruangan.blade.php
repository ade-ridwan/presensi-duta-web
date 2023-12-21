@extends('pegawai.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Scan Ruangan</h3>
                <div style="width: 100%; height:100%;" id="reader"></div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"
        integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var scan = 1;

        function onScanSuccess(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            console.log(`Scan result: ${decodedText}`, decodedResult);
            $.ajax({
                url: '{{ route('pegawai.scan.ruangan.store') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id_ruang: decodedText,
                },
                success: function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: response.message,
                    });
                    setTimeout(() => {
                        window.location.href = '{{ route('pegawai.dashboard') }}';
                    }, 1000);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: jqXHR.responseJSON.message,
                    });
                }
            });

        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250,
                supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@endpush
