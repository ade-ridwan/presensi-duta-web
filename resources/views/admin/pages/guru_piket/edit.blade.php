@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Edit Data Guru Piket</h3>

                <form action="{{ route('admin.guru_piket.update', $guru_piket->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="kode_pegawai" class="form-label">Nama Pegawai</label>
                        <select name="kode_pegawai" placeholder="Masukkan disini" type="text"
                            class="form-select @error('kode_pegawai') is-invalid @enderror" id="kode_pegawai">
                            <option value="">Silakan Pilih Nama Pegawai</option>
                            @foreach ($pegawai as $item)
                                <option @selected($guru_piket->kode_pegawai == $item->kode_pegawai) value="{{ $item->kode_pegawai }}">{{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kode_pegawai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kode_hari" class="form-label">Hari</label>
                        <span class="text-danger">*</span>
                        <select name="kode_hari" class="form-select @error('kode_hari') is-invalid @enderror"
                            id="inputGroupSelect01" id="kode_hari">
                            <option value="">Pilih...</option>
                            <option value="1" @selected($guru_piket->kode_hari == 1)>Senin</option>
                            <option value="2" @selected($guru_piket->kode_hari == 2)>Selasa</option>
                            <option value="3" @selected($guru_piket->kode_hari == 3)>Rabu</option>
                            <option value="4" @selected($guru_piket->kode_hari == 4)>Kamis</option>
                            <option value="5" @selected($guru_piket->kode_hari == 5)>Jum'at</option>
                            <option value="6" @selected($guru_piket->kode_hari == 6)>Sabtu</option>
                        </select>
                        @error('kode_hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                        <input name="tahun_ajaran" placeholder="Masukkan disini" type="text"
                            class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran"
                            value="{{ $guru_piket->tahun_ajaran }}">
                        @error('tahun_ajaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

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
