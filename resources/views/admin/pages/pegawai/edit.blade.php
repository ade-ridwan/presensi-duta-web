@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Edit Data Pegawai</h3>

                <form action="{{ route('admin.pegawai.update', $pegawai->kode_pegawai) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="kode_pegawai" class="form-label">Kode Pegawai</label>
                        <span class="text-danger">*</span>
                        <input name="kode_pegawai" placeholder="Masukkan disini" type="text"
                            class="form-control @error('kode_pegawai') is-invalid @enderror" id="kode_pegawai"
                            value="{{ $pegawai->kode_pegawai }}" readonly>
                        @error('kode_pegawai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <span class="text-danger">*</span>
                        <input name="nik" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nik') is-invalid @enderror" id="nik"
                            value="{{ $pegawai->nik }}">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nuptk" class="form-label">NUPTK</label>
                        <input name="nuptk" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nuptk') is-invalid @enderror" id="nuptk"
                            value="{{ $pegawai->nuptk }}">
                        @error('nuptk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pegawai</label>
                        <span class="text-danger">*</span>
                        <input name="nama" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nama') is-invalid @enderror" id="nama"
                            value="{{ $pegawai->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <span class="text-danger">*</span>
                        <select name="jk" class="form-select @error('jk') is-invalid @enderror" id="inputGroupSelect01"
                            id="jk">
                            <option value="">Pilih...</option>
                            <option value="L" @selected($pegawai->jk == 'L')>Laki-laki</option>
                            <option value="P" @selected($pegawai->jk == 'P')>Perempuan</option>
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
                            <option value="">Pilih...</option>
                            <option value="ks" @selected($pegawai->jenis_ptk == 'ks')>Kepala Sekolah</option>
                            <option value="gr" @selected($pegawai->jenis_ptk == 'gr')>Guru</option>
                            <option value="tu" @selected($pegawai->jenis_ptk == 'tu')>Tenaga Tata Usaha</option>
                            <option value="st" @selected($pegawai->jenis_ptk == 'st')>Petugas Keamanan</option>
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
                            <option value="">Pilih...</option>
                            <option value="gty" @selected($pegawai->status_pegawai == 'gty')>GTY/PTY</option>
                            <option value="gh" @selected($pegawai->status_pegawai == 'gh')>Guru Honorer Sekolah</option>
                            <option value="th" @selected($pegawai->status_pegawai == 'th')>Tenaga Honorer Sekolah</option>
                        </select>
                        @error('status_pegawai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <span class="text-danger">*</span>
                        <input name="foto" placeholder="Masukkan disini" type="file"
                            class="form-control @error('foto') is-invalid @enderror" id="foto"
                            value="{{ $pegawai->foto }}">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <span class="text-danger">*</span>
                        <input name="email" placeholder="Masukkan disini" type="email"
                            class="form-control @error('email') is-invalid @enderror" id="email"
                            value="{{ $user->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
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
