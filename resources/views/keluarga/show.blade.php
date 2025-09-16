@extends('adminlte::page')

@section('title', 'Detail Keluarga Dosen')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Detail Keluarga - {{ $dosen->nama }}</h4>
    </div>
    <div class="card-body">
        <a href="{{ route('keluarga.create', $dosen->id) }}" class="btn btn-primary mb-3">
            Tambah Keluarga
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota Keluarga</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Hubungan Keluarga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($keluarga as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->nik }}</td>
                    <td>{{ $k->jk }}</td>
                    <td>{{ $k->tmpt_lahir }}, {{ $k->tgl_lahir }}</td>
                    <td>{{ $k->hubungan_keluarga }}</td>
                    <td>
                        @if($k->id)
                            <a href="{{ route('keluarga.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('keluarga.destroy', $k->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                                    Hapus
                                </button>
                            </form>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data keluarga</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
