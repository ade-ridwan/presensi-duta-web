@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Edit Data Pegawai</h3>

                <form action="{{ route('admin.pegawai.update', $pegawai->kode_pegawai) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama pegawai</label>
                        <input name="nama" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nama') is-invalid @enderror" id="nama"
                            value="{{ $pegawai->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button type="Tambahkan" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
