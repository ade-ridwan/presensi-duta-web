@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Tambah Data Guru Piket</h3>

                <form action="{{ route('admin.guru_piket.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_pegawai" class="form-label">Nama Pegawai</label>
                        <span class="text-danger">*</span>
                        <select name="kode_pegawai" placeholder="Masukkan disini" type="text"
                            class="form-select @error('kode_pegawai') is-invalid @enderror" id="kode_pegawai">
                            <option value="">Silakan Pilih Nama Pegawai</option>
                            @foreach ($pegawai as $item)
                            <option value=" {{ $item->kode_pegawai }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('kode_pegawai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <span class="text-danger">*</span>
                        <select name="hari" class="form-select @error('hari') is-invalid @enderror" id="inputGroupSelect01"
                            id="hari">
                            <option value="" selected="">Pilih...</option>
                            <option value="se">Senin</option>
                            <option value="sel">Selasa</option>
                            <option value="ra">Rabu</option>
                            <option value="ka">Kamis</option>
                            <option value="ju">Jum'at</option>
                        </select>
                        @error('hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                        <input name="tahun_ajaran" placeholder="Masukkan disini" type="text"
                            class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran"
                            value="{{ date('Y') }}">
                        @error('tahun_ajaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="Tambahkan" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.guru_piket.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
