@extends('adminlte::page')

@section('title', 'Data Dosen')

@section('content')
<div class="container">
    <h3 class="mb-3">Data Dosen</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($user->role === 'admin')
        <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">Tambah Dosen</a>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dosen as $d)
                <tr>
                    <td>{{ $d->nik }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->kd_prodi }}</td>
                    <td>
                        <a href="{{ route('dosen.edit', $d->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        @if($user->role === 'admin')
                        <form action="{{ route('dosen.destroy', $d->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
