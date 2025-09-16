@extends('adminlte::page')

@section('title', 'Edit Pelatihan')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Pelatihan</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pelatihan.update', $pelatihan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id_dosen" value="{{ $pelatihan->id_dosen }}">

            <div class="form-group">
                <label for="no_surat_tugas">No Surat Tugas</label>
                <input type="text" name="no_surat_tugas" class="form-control" 
                       value="{{ old('no_surat_tugas', $pelatihan->no_surat_tugas) }}" required>
            </div>

            <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                <input type="date" name="tgl_mulai" class="form-control" 
                       value="{{ old('tgl_mulai', $pelatihan->tgl_mulai) }}" required>
            </div>

            <div class="form-group">
                <label for="tgl_mulai">Tanggal Selesai</label>
                <input type="date" name="tgl_selesai" class="form-control" 
                       value="{{ old('tgl_selesai', $pelatihan->tgl_selesai) }}" required>
            </div>

            <div class="form-group">
                <label for="durasi">Durasi</label>
                <input type="text" name="durasi" value="{{$pelatihan->durasi }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" class="form-control" 
                    value="{{ old('nama_kegiatan', $pelatihan->nama_kegiatan) }}">
            </div>

            <div class="form-group">
                <label for="tempat_kegiatan">Tempat Kegiatan</label>
                <input type="text" name="tempat_kegiatan" class="form-control" 
                    value="{{ old('tempat_kegiatan', $pelatihan->tempat_kegiatan) }}">
            </div>

            <div class="form-group">
                <label for="penyelenggara">Penyelenggara</label>
                <input type="text" name="penyelenggara" class="form-control"
                    value="{{ old('tempat_kegiatan', $pelatihan->penyelenggara) }}">
            </div>

            <div class="form-group">
                <label for="sebagai_kode">Sebagai Kode</label>
                <input type="text" name="sebagai_kode" value="{{ $pelatihan->sebagai_kode }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="sertifikat">Sertifikat</label>
                <input type="text" name="sertifikat" value="{{ $pelatihan->sertifikat }}" class="form-control">
            </div> 
            
            <div class="form-group">
                <label for="link_surat_tugas">Link Surat Tugas</label>
                <input type="link" name="link_surat_tugas" value="{{ $pelatihan->link_surat_tugas }}" class="form-control">
            </div> 

            <div class="form-group">
                <label for="sebagai_kode">Keterangan Surat Tugas</label>
                <input type="text" name="ket_surat_tugas" value="{{ $pelatihan->ket_surat_tugas }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pelatihan.show', $pelatihan->id_dosen) }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
