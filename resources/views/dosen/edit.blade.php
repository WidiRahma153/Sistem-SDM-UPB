@extends('adminlte::page')

@section('title', 'Edit Dosen')

@section('content')
<div class="container">
    <h3>Edit Data Dosen</h3>
    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" value="{{ $dosen->nik }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIDN</label>
            <input type="text" name="nidn" value="{{ $dosen->nidn }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No KTP</label>
            <input type="text" name="no_ktp" value="{{ $dosen->no_ktp }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $dosen->nama }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tmp_lhr" value="{{ $dosen->tmp_lhr}}" class="form-control" required>
        </div>
        <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lhr" value="{{ $dosen->tgl_lhr }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $dosen->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ $dosen->alamat }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
