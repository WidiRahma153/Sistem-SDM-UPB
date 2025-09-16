@extends('adminlte::page')

@section('title', 'Tambah Pendidikan')

@section('content')
<div class="card">
  <div class="card-body">
    <h4>Tambah Pendidikan untuk {{ $dosen->nama }}</h4>

    <form action="{{ route('pendidikan.store') }}" method="POST">
      @csrf
      <input type="hidden" name="id_dosen" value="{{ $dosen->id }}">

      <div class="form-group">
        <label for="id_jenjang">Jenjang</label>
        <select name="id_jenjang" id="id_jenjang" class="form-control" required>
            <option value="">-- Pilih Jenjang --</option>
            @foreach($jenjang as $j)
                <option value="{{ $j->id }}">{{ $j->nama_jenjang }}</option>
            @endforeach
        </select>
    </div>
      <div class="mb-3">
        <label>Jurusan</label>
        <input type="text" name="jurusan" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Nama Sekolah</label>
        <input type="text" name="nama_sekolah" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tanggal Lulus</label>
        <input type="date" name="tgl_lulus" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Gelar</label>
        <input type="text" name="gelar" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{ route('pendidikan.show', $dosen->id) }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
