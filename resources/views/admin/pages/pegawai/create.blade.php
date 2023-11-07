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
                        <input name="kode_pegawai" placeholder="Masukkan disini" type="text"
                            class="form-control @error('kode_pegawai') is-invalid @enderror" id="kode_pegawai">
                        @error('kode_pegawai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
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
                        <input name="nama" placeholder="Masukkan disini" type="text"
                            class="form-control @error('nama') is-invalid @enderror" id="nama">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label> <br>
                            <select class="form-select" id="inputGroupSelect01"
                            @error('jk') is-invalid @enderror" id="jk">
                              <option selected="">Pilih...</option>
                              <option value="L">Laki-laki</option>
                              <option value="P">Perempuan</option>#
                            </select>
                        @error('jk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jk" class="form-label">Jenis PTK</label> <br>
                            <select class="form-select" id="inputGroupSelect01"
                            @error('jk') is-invalid @enderror" id="jk">
                              <option selected="">Pilih...</option>
                              <option value="ks">Kepala Sekolah</option>
                              <option value="gr">Guru</option>
                              <option value="tu">Tenaga Tata Usaha</option>
                              <option value="st">Petugas Keamanan</option>
                            </select>
                        @error('jk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jk" class="form-label">Status Pegawai</label> <br>
                            <select class="form-select" id="inputGroupSelect01"
                            @error('jk') is-invalid @enderror" id="jk">
                              <option selected="">Pilih...</option>
                              <option value="gty">GTY/PTY</option>
                              <option value="gh">Guru Honorer Sekolah</option>
                              <option value="th">Tenaga Honorer Sekolah</option>
                            </select>
                        @error('jk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_user" class="form-label">Status User</label>
                        <select name="id_user" placeholder="Masukkan disini" type="text"
                            class="form-select @error('id_user') is-invalid @enderror" id="id_user">
                            <option value="">Silakan Pilih User</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('id_user')
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
