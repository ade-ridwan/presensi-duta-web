@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Data Waktu Absensi</h3>

                @if ($message = session('success'))
                    <div class="alert alert-success my-4">
                        {{ $message }}
                    </div>
                @endif
                <form action="" method="GET">
                    <div class="mb-3 d-flex gap-3 justify-content-between">
                        <div>
                            <a href="{{ route('admin.waktu_absensi.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                        </div>
                        <div>
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" value="{{ request()->search }}" class="form-control"
                                    placeholder="Pencarian" aria-label="Recipient's username"
                                    aria-describedby="button-addon2">
                                <button type="submit" class="btn btn-outline-primary" type="button" id="button-addon2">
                                    <i class="bx bx-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Status</th>
                                <th scope="col">Shift</th>
                                <th scope="col">Jam Masuk</th>
                                <th scope="col">Jam Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($waktu_absensi as $key => $item)
                                <tr>
                                    <th scope="row">{{ $waktu_absensi->firstItem() + $key }}</th>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->shift }}</td>
                                    <td>{{ $item->jam_masuk }}</td>
                                    <td>{{ $item->jam_keluar }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Yakin akan dihapus?')"
                                            action="{{ route('admin.waktu_absensi.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.waktu_absensi.edit', $item->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit</a>
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="99" align="center">Data Nothing.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $waktu_absensi->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
