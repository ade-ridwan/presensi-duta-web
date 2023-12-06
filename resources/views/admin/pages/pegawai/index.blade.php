@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Data Pegawai</h3>

                @if ($message = session('success'))
                    <div class="alert alert-success my-4">
                        {{ $message }}
                    </div>
                @endif
                <form action="" method="GET">
                    <div class="mb-3 d-flex gap-3 justify-content-between">
                        <div>
                            <a href="{{ route('admin.pegawai.create') }}" class="btn btn-sm btn-primary">Tambah</a>
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
                                <th scope="col">Kode Pegawai</th>
                                <th scope="col">NIK</th>
                                <th scope="col">NUPTK</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Jenis PTK</th>
                                <th scope="col">Status Pegawai</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pegawai as $key => $item)
                                <tr>
                                    <th scope="row">{{ $item->kode_pegawai }}</th>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->nuptk }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        @if ($item->jk == 'L')
                                            Laki-laki
                                        @endif
                                        @if ($item->jk == 'P')
                                            Perempuan
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->jenis_ptk == 'ks')
                                            Kepala Sekolah
                                        @endif
                                        @if ($item->jenis_ptk == 'gr')
                                            Guru
                                        @endif
                                        @if ($item->jenis_ptk == 'tu')
                                            Tenaga Tata Usaha
                                        @endif
                                        @if ($item->jenis_ptk == 'st')
                                            Petugas Keamanan
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status_pegawai == 'gty')
                                            GTY/PTY
                                        @endif
                                        @if ($item->status_pegawai == 'gh')
                                            Guru Honorer Sekolah
                                        @endif
                                        @if ($item->status_pegawai == 'th')
                                            Tenaga Honorer Sekolah
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="foto" width="120px">
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Yakin akan dihapus?')"
                                            action="{{ route('admin.pegawai.destroy', $item->kode_pegawai) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.pegawai.edit', $item->kode_pegawai) }}"
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
                    {{ $pegawai->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
