<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body onload="window.print()">
    <div class="pt-4 pb-1">
        <h3 class="text-center">QR CODE Ruang</h3>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th class="px-4" scope="col">Ruang</th>
                <th scope="col">Tahun Ajaran</th>
                <th scope="col" class="text-center">Kode QR</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ruang as $key => $item)
                <tr>
                    <td class="px-4">{{ $item->nama }}</td>
                    <td>{{ $item->tahun_ajaran }}</td>
                    <td>
                        <div class="visible-print text-center">
                            {!! QrCode::size(100)->generate($item->id) !!}
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="99" align="center">Data Nothing.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
