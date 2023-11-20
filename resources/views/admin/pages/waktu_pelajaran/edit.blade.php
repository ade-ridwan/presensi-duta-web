@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Edit Waktu Pelajaran</h3>

                <form action="{{ route('admin.waktu_pelajaran.update', $waktu_pelajaran->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="kode_hari" class="form-label">Hari</label>
                        <span class="text-danger">*</span>
                        <select name="kode_hari" class="form-select @error('kode_hari') is-invalid @enderror"
                            id="inputGroupSelect01" id="kode_hari">
                            <option value="">Pilih...</option>
                            <option value="1" @selected($waktu_pelajaran->kode_hari == 1)>Senin</option>
                            <option value="2" @selected($waktu_pelajaran->kode_hari == 2)>Selasa</option>
                            <option value="3" @selected($waktu_pelajaran->kode_hari == 3)>Rabu</option>
                            <option value="4" @selected($waktu_pelajaran->kode_hari == 4)>Kamis</option>
                            <option value="5" @selected($waktu_pelajaran->kode_hari == 5)>Jum'at</option>
                            <option value="6" @selected($waktu_pelajaran->kode_hari == 6)>Sabtu</option>
                        </select>
                        @error('kode_hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Jam Ke</label>
                        <input name="nama" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nama') is-invalid @enderror" id="nama"
                            value="{{ $waktu_pelajaran->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_masuk" class="form-label">jam masuk</label>
                        <input name="jam_masuk" placeholder="Masukkan disini" type="time"
                            class="form-control @error('jam_masuk') is-invalid @enderror" id="jam_masuk"
                            value="{{ $waktu_pelajaran->jam_masuk }}">
                        @error('jam_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_keluar" class="form-label">Jam keluar</label>
                        <input name="jam_keluar" placeholder="Masukkan disini" type="time"
                            class="form-control @error('Jam_keluar') is-invalid @enderror" id="Jam_keluar"
                            value="{{ $waktu_pelajaran->jam_keluar }}">
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
