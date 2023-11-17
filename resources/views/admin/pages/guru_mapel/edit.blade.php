@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Edit Data Guru Mapel</h3>

                <form action="{{ route('admin.guru_mapel.update', $guru_mapel->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="kode_pegawai" class="form-label">Nama Pegawai</label>
                        <select name="kode_pegawai" placeholder="Masukkan disini" type="text"
                            class="form-select @error('kode_pegawai') is-invalid @enderror" id="kode_pegawai">
                            <option value="">Silakan Pilih Nama Pegawai</option>
                            @foreach ($pegawai as $item)
                                <option @selected($guru_mapel->kode_pegawai == $item->kode_pegawai) value="{{ $item->kode_pegawai }}">{{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kode_pegawai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_mapel" class="form-label">Mata pelajaran</label>
                        <select name="id_mapel" placeholder="Masukkan disini" type="text"
                            class="form-select @error('id_mapel') is-invalid @enderror" id="id_mapel">
                            <option value="">Silakan Pilih Mata Pelajaran</option>
                            @foreach ($mapel as $item)
                                <option @selected($guru_mapel->id_mapel == $item->id_mapel) value="{{ $item->id_mapel }}">{{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_mapel')
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
