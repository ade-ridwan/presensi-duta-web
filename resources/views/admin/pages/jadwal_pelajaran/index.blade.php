@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Data Jadwal Pelajaran</h3>

                @if ($message = session('success'))
                    <div class="alert alert-success my-4">
                        {{ $message }}
                    </div>
                @endif
                <form action="" method="GET">
                    <div class="mb-3 d-flex gap-3 justify-content-between">
                        <div>
                            <a href="{{ route('admin.jadwal_pelajaran.create') }}" class="btn btn-sm btn-primary">Tambah</a>
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
                                <th scope="col">Waktu Pelajaran</th>
                                <th scope="col">Nama Guru - Mapel</th>
                                <th scope="col">Ruang</th>
                                <th scope="col">Tahun Ajaran</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jadwal_pelajaran as $key => $item)
                                <tr>
                                    <th scope="row">{{ $jadwal_pelajaran->firstItem() + $key }}</th>
                                    {{-- jadi pemanggilan untuk relasi nama function model untuk relasinya  --}}
                                    <td>{{ $item->waktu_pelajaran->nama }} -
                                        {{ getDayId($item->waktu_pelajaran->kode_hari)}}</td>
                                    <td>{{ $item->waktu_pelajaran->nama }}</td>
                                    <td>{{ $item->ruang->nama }}</td>
                                    <td>{{ $item->tahun_ajaran }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Yakin akan dihapus?')"
                                            action="{{ route('admin.jadwal_pelajaran.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.jadwal_pelajaran.edit', $item->id) }}"
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
                    {{ $jadwal_pelajaran->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


