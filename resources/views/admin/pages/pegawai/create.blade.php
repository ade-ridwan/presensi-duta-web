@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Tambah Data Pegawai</h3>

                <form action="{{ route('admin.pegawai.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_pegawai" class="form-label">Kode Pegawai</label>
                        <span class="text-danger">*</span>
                        <input name="kode_pegawai" placeholder="Masukkan disini" type="text"
                            class="form-control @error('kode_pegawai') is-invalid @enderror" id="kode_pegawai">
                        @error('kode_pegawai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <span class="text-danger">*</span>
                        <input name="nik" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nik') is-invalid @enderror" id="nik">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nuptk" class="form-label">NUPTK</label>
                        <input name="nuptk" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nuptk') is-invalid @enderror" id="nuptk">
                        @error('nuptk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pegawai</label>
                        <span class="text-danger">*</span>
                        <input name="nama" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nama') is-invalid @enderror" id="nama">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <span class="text-danger">*</span>
                        <select name="jk" class="form-select @error('jk') is-invalid @enderror" id="inputGroupSelect01"
                            id="jk">
                            <option value="" selected="">Pilih...</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>#
                        </select>
                        @error('jk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis_ptk" class="form-label">Jenis PTK</label>
                        <span class="text-danger">*</span>
                        <select name="jenis_ptk" class="form-select @error('jenis_ptk') is-invalid @enderror"
                            id="inputGroupSelect01" id="jenis_ptk">
                            <option value="" selected="">Pilih...</option>
                            <option value="ks">Kepala Sekolah</option>
                            <option value="gr">Guru</option>
                            <option value="tu">Tenaga Tata Usaha</option>
                            <option value="st">Petugas Keamanan</option>
                        </select>
                        @error('jenis_ptk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status_pegawai" class="form-label">Status Pegawai</label>
                        <span class="text-danger">*</span>
                        <select name="status_pegawai" class="form-select @error('status_pegawai') is-invalid @enderror"
                            id="inputGroupSelect01" id="status_pegawai">
                            <option value="" selected="">Pilih...</option>
                            <option value="gty">GTY/PTY</option>
                            <option value="gh">Guru Honorer Sekolah</option>
                            <option value="th">Tenaga Honorer Sekolah</option>
                        </select>
                        @error('status_pegawai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <span class="text-danger">*</span>
                        <input name="email" placeholder="Masukkan disini" type="email"
                            class="form-control @error('email') is-invalid @enderror" id="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <span class="text-danger">*</span>
                        <input name="password" placeholder="Masukkan disini" type="password"
                            class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
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
