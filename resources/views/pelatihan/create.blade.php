@extends('adminlte::page')

@section('title', 'Tambah Pelatihan')

@section('content')
<div class="card">
  <div class="card-body">
    <h4>Tambah Pelatihan untuk {{ $dosen->nama }}</h4>

    <form action="{{ route('pelatihan.store') }}" method="POST">
      @csrf
      <input type="hidden" name="id_dosen" value="{{ $dosen->id }}">

      <div class="mb-3">
        <label>No Surat Tugas</label>
        <input type="text" name="no_surat_tugas" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tanggal Mulai</label>
        <input type="date" name="tgl_mulai" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tanggal Selesai</label>
        <input type="date" name="tgl_selesai" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Nama Kegiatan</label>
        <input type="string" name="nama_kegiatan" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tempat Kegiatan</label>
        <input type="string" name="tempat_kegiatan" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Penyelenggara</label>
        <input type="string" name="penyelenggara" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{ route('pelatihan.show', $dosen->id) }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
