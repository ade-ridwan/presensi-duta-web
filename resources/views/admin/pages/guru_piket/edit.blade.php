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
                                <option @selected($guru_piket->kode_pegawai == $item->id) value="{{ $item->id }}">{{ $item->nama }}
                                </option>
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
                            <option value="">Pilih...</option>
                            <option value="se" @selected($guru_piket->hari == 'se')>Senin</option>
                            <option value="sel" @selected($guru_piket->hari == 'sel')>Selasa</option>
                            <option value="ra" @selected($guru_piket->hari == 'ra')>Rabu</option>
                            <option value="ka" @selected($guru_piket->hari == 'ka')>Kamis</option>
                            <option value="ju" @selected($guru_piket->hari == 'ju')>Jum'at</option>
                        </select>
                        @error('hari')
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
                        <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                        <input name="tahun_ajaran" placeholder="Masukkan disini" type="text"
                            class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran"
                            value="{{ $ruang->tahun_ajaran }}">
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
