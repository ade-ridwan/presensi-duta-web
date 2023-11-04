@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Edit Waktu Pelajaran</h3>

                <form action="{{ route('admin.waktu_pelajaran.update', $waktu_pelajaran->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input name="nama" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nama') is-invalid @enderror" id="nama">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_masuk" class="form-label">jam_masuk</label>
                        <input name="jam_masuk" placeholder="Masukkan disini" type="time"
                            class="form-control @error('jam_masuk') is-invalid @enderror" id="jam_masuk">
                        @error('jam_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="Jam_keluar" class="form-label">Jam_keluar</label>
                        <input name="Jam_keluar" placeholder="Masukkan disini" type="time"
                            class="form-control @error('Jam_keluar') is-invalid @enderror" id="Jam_keluar">
                        @error('Jam_keluar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kode_hari" class="form-label">kode_hari</label>
                        <input name="kode_hari" placeholder="Masukkan disini" type="text"
                            class="form-control @error('kode_hari') is-invalid @enderror" id="kode_hari">
                        @error('kode_hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_hari" class="form-label">nama_hari</label>
                        <input name="nama_hari" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nama_hari') is-invalid @enderror" id="nama_hari">
                        @error('nama_hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="Tambahkan" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.waktu_pelajaran.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
