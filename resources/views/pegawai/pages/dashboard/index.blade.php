@extends('pegawai.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                    </div>
                    <div class="card-body">
                        <h5>Selamat Datang, {{ auth()->user()->pegawai->nama }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Jam Pelajaran</th>
                                        <th scope="col">Waktu Pelajaran</th>
                                        <th scope="col">Mapel</th>
                                        <th scope="col">Ruang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jadwal_pelajaran as $key => $item)
                                        <tr class="bg-success text-white">
                                            <td>{{ $jadwal_pelajaran->firstItem() + $key }}</td>
                                            {{-- jadi pemanggilan untuk relasi nama function model untuk relasinya  --}}
                                            <td>{{ $item->waktu_pelajaran->nama }}</td>
                                            <td>{{ $item->waktu_pelajaran->jam_masuk }} -
                                                {{ $item->waktu_pelajaran->jam_keluar }}</td>
                                            <td>{{ $item->guru_mapel->mapel->nama }}</td>
                                            <td>{{ $item->ruang->nama }}</td>
                                        </tr>
                                        <tr class="bg-danger text-white">
                                            <td>{{ $jadwal_pelajaran->firstItem() + $key }}</td>
                                            {{-- jadi pemanggilan untuk relasi nama function model untuk relasinya  --}}
                                            <td>{{ $item->waktu_pelajaran->nama }}</td>
                                            <td>{{ $item->waktu_pelajaran->jam_masuk }} -
                                                {{ $item->waktu_pelajaran->jam_keluar }}</td>
                                            <td>{{ $item->guru_mapel->mapel->nama }}</td>
                                            <td>{{ $item->ruang->nama }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="99" align="center">Data Nothing.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
