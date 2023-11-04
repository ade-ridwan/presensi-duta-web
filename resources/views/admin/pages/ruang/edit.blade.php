@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Edit Ruang</h3>

                <form action="{{ route('admin.ruang.update', $ruang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Ruang</label>
                        <input name="nama" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nama') is-invalid @enderror" id="nama"
                            value="{{ $ruang->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                        <input name="tahun_ajaran" placeholder="Masukkan disini" type="text"
                            class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran"
                            value="{{ $ruang->tahun_ajaran }}">
                        @error('tahun_ajaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="Tambahkan" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.ruang.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
