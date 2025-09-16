@extends('adminlte::page')

@section('title', 'Detail Pelatihan Dosen')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Detail Pelatihan - {{ $dosen->nama }}</h4>
    </div>
    <div class="card-body">
        <a href="{{ route('pelatihan.create', $dosen->id) }}" class="btn btn-primary mb-3">
            Tambah Pelatihan
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Surat Tugas</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Nama Kegiatan</th>
                    <th>Tempat Kegiatan</th>
                    <th>Penyelenggara</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pelatihan as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->no_surat_tugas }}</td>
                    <td>{{ $p->tgl_mulai }}</td>
                    <td>{{ $p->tgl_selesai }}</td>
                    <td>{{ $p->nama_kegiatan }}</td>
                    <td>{{ $p->tempat_kegiatan }}</td>
                    <td>{{ $p->penyelenggara}}</td>
                    <td>
                        @if($p->id)
                            <a href="{{ route('pelatihan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pelatihan.destroy', $p->id) }}" method="POST" style="display:inline-block;">
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
                    <td colspan="7" class="text-center">Belum ada data pelatihan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
