@extends('admin.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h3>Edit Data Guru Mapel</h3>

                <form action="{{ route('admin.jadwal_pelajaran.update', $jadwal_pelajaran->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="id_waktu_pelajaran" class="form-label">Waktu Pelajaran</label>
                        <select name="id_waktu_pelajaran" placeholder="Masukkan disini" type="text"
                            class="form-select @error('id_waktu_pelajaran') is-invalid @enderror" id="id_waktu_pelajaran">
                            <option value="">Silakan Pilih Waktu Pelajaran</option>
                            @foreach ($waktu_pelajaran as $item)
                                <option @selected($jadwal_pelajaran->id_waktu_pelajaran == $item->id) value="{{ $item->id}}">
                                    {{ $item->nama }} - {{ getDayID($item->kode_hari) }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_waktu_pelajaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_guru_mapel" class="form-label">Nama Guru - Mapel</label>
                        <span class="text-danger">*</span>
                        <select name="id_guru_mapel" placeholder="Masukkan disini" type="text"
                            class="form-select @error('id_guru_mapel') is-invalid @enderror" id="id_guru_mapel">
                            <option value="">Silakan Pilih Guru Mapel</option>
                            @foreach ($guru_mapel as $item)
                            <option @selected($jadwal_pelajaran->id_guru_mapel == $item->id) value="{{ $item->id }}">
                                {{ $item->pegawai->nama }} - {{ $item->mapel->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_guru_mapel')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_ruang" class="form-label">Ruang</label>
                        <span class="text-danger">*</span>
                        <select name="id_ruang" placeholder="Masukkan disini" type="text"
                            class="form-select @error('id_ruang') is-invalid @enderror" id="id_ruang">
                            <option value="">Silakan Pilih Ruang</option>
                            @foreach ($ruang as $item)
                            <option @selected($jadwal_pelajaran->id_ruang == $item->id) value="{{ $item->id }}">
                                {{ $item->nama }} </option>
                            @endforeach
                        </select>
                        @error('id_ruang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                        <input name="tahun_ajaran" placeholder="Masukkan disini" type="text"
                            class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran"
                            value="{{ $jadwal_pelajaran->tahun_ajaran }}">
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
