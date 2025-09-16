@extends('adminlte::page')

@section('title', 'Edit Pendidikan')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Pendidikan</h3>
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

        <form action="{{ route('pendidikan.update', $pendidikan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id_dosen" value="{{ $pendidikan->id_dosen }}">

            <div class="form-group">
                <label for="id_jenjang">Jenjang</label>
                <select name="id_jenjang" id="id_jenjang" class="form-control" required>
                    <option value="">-- Pilih Jenjang --</option>
                    @foreach($jenjang as $j)
                        <option value="{{ $j->id }}" {{ $pendidikan->id_jenjang == $j->id ? 'selected' : '' }}>
                            {{ $j->nama_jenjang }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" 
                       value="{{ old('jurusan', $pendidikan->jurusan) }}" required>
            </div>

            <div class="form-group">
                <label for="nama_sekolah">Nama Sekolah</label>
                <input type="text" name="nama_sekolah" class="form-control" 
                       value="{{ old('nama_sekolah', $pendidikan->nama_sekolah) }}" required>
            </div>

             <div class="form-group">
                <label for="ipk">IPK</label>
                <input type="text" name="ipk" value="{{ $pendidikan->ipk }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                <input type="date" name="tgl_mulai" value="{{ $pendidikan->tgl_mulai }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="tgl_lulus">Tanggal Lulus</label>
                <input type="date" name="tgl_lulus" class="form-control" 
                       value="{{ old('tgl_lulus', $pendidikan->tgl_lulus) }}" required>
            </div>

            <div class="form-group">
                <label for="gelar">Gelar</label>
                <input type="text" name="gelar" class="form-control" 
                       value="{{ old('gelar', $pendidikan->gelar) }}" required>
            </div>

            <div class="form-group">
                <label for="link_ijazah_transkip">Link Ijazah & Transkip</label>
                <input type="text" name="link_ijazah_transkip" value="{{ $pendidikan->link_ijazah_transkip }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="ket_ijazah_transkip">Keterangan Ijazah & Transkip</label>
                <textarea name="ket_ijazah_transkip" class="form-control" rows="3">{{ $pendidikan->ket_ijazah_transkip }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pendidikan.show', $pendidikan->id_dosen) }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
