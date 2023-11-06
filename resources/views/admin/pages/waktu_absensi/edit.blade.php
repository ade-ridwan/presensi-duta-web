@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Edit Waktu Ruang</h3>

                <form action="{{ route('admin.waktu_absensi.update', $waktu_absensi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input name="status" placeholder="Masukkan disini" type="text"
                            class="form-control @error('status') is-invalid @enderror" id="status"
                            value="{{ $waktu_absensi->status }}">
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="shift" class="form-label">Shift</label>
                        <input name="shift" placeholder="Masukkan disini" type="text"
                            class="form-control @error('shift') is-invalid @enderror" id="shift"
                            value="{{ $waktu_absensi->shift }}">
                        @error('shift')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_masuk" class="form-label">Jam Masuk</label>
                        <input name="jam_masuk" placeholder="Masukkan disini" type="time"
                            class="form-control @error('jam_masuk') is-invalid @enderror" id="jam_masuk"
                            value="{{ $waktu_absensi->jam_masuk }}">
                        @error('jam_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_keluar" class="form-label">Jam Keluar</label>
                        <input name="jam_keluar" placeholder="Masukkan disini" type="time"
                            class="form-control @error('jam_keluar') is-invalid @enderror" id="jam_keluar"
                            value="{{ $waktu_absensi->jam_keluar }}">
                        @error('jam_keluar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="Tambahkan" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.waktu_absensi.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
