@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Data Absensi Mengajar</h3>

                @if ($message = session('success'))
                    <div class="alert alert-success my-4">
                        {{ $message }}
                    </div>
                @endif
                <form action="" method="GET">
                    <div class="mb-3 d-flex gap-3 justify-content-between">
                        {{-- <div>
                            <a href="{{ route('admin.absen_mengajar.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                        </div> --}}
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
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Guru</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Ruang</th>
                                <th scope="col">Jam Masuk</th>
                                <th scope="col">Jam Keluar</th>
                                <th scope="col">Tahun Ajaran</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($absen_mengajar as $key => $item)
                                <tr>
                                    <th scope="row">{{ $absen_mengajar->firstItem() + $key }}</th>
                                    {{-- jadi pemanggilan untuk relasi nama function model untuk relasinya  --}}
                                    <td>{{ $item->tgl }}</td>
                                    <td>{{ $item->pegawai->nama }}</td>
                                    <td>{{ $item->jadwal_pelajaran->guru_mapel->mapel->nama }}</td>
                                    <td>{{ $item->jadwal_pelajaran->ruang->nama }}</td>
                                    <td>{{ $item->jam_masuk }}</td>
                                    <td>{{ $item->jam_keluar }}</td>
                                    <td>{{ $item->tahun_ajaran }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Yakin akan dihapus?')"
                                            action="{{ route('admin.absen_mengajar.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
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
                    {{ $absen_mengajar->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
