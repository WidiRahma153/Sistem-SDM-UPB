@extends('adminlte::page')

@section('title', 'Tambah Keluarga')

@section('content')
<div class="card">
  <div class="card-body">
    <h4>Tambah Anggota Keluarga untuk {{ $dosen->nama }}</h4>

    <form action="{{ route('keluarga.store') }}" method="POST">
      @csrf
      <input type="hidden" name="id_dosen" value="{{ $dosen->id }}">

      <div class="mb-3">
        <label>Nama Anggota Keluarga</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>NIK</label>
        <input type="text" name="nik" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tempat Lahir</label>
        <input type="text" name="tmpt_lahir" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jk" class="form-control" required>
            <option value=""> Pilih Jenis Kelamin</option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select>
      </div>
      <div class="mb-3">
        <label>Hubungan Keluarga</label>
        <input type="text" name="hubungan_keluarga" class="form-control" required>
      </div>
      
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{ route('keluarga.show', $dosen->id) }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
