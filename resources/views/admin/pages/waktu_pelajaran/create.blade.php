@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Tambah Waktu Pelajaran</h3>

                <form action="{{ route('admin.waktu_pelajaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="kode_hari" class="form-label">Hari</label>
                        <span class="text-danger">*</span>
                        <select name="kode_hari" class="form-select @error('kode_hari') is-invalid @enderror" id="inputGroupSelect01"
                            id="kode_hari">
                            <option value="" selected="">Pilih...</option>
                            <option value="0">Minggu</option>
                            <option value="1">Senin</option>
                            <option value="2">Selasa</option>
                            <option value="3">Rabu</option>
                            <option value="4">Kamis</option>
                            <option value="5">Jum'at</option>
                            <option value="6">Sabtu</option>
                        </select>
                        @error('kode_hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Jam Ke</label>
                        <span class="text-danger">*</span>
                        <input name="nama" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nama') is-invalid @enderror" id="nama">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_masuk" class="form-label">jam_masuk</label>
                        <span class="text-danger">*</span>
                        <input name="jam_masuk" placeholder="Masukkan disini" type="time"
                            class="form-control @error('jam_masuk') is-invalid @enderror" id="jam_masuk">
                        @error('jam_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_keluar" class="form-label">Jam_keluar</label>
                        <span class="text-danger">*</span>
                        <input name="jam_keluar" placeholder="Masukkan disini" type="time"
                            class="form-control @error('jam_keluar') is-invalid @enderror" id="jam_keluar">
                        @error('jam_keluar')
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
