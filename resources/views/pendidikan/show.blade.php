@extends('adminlte::page')

@section('title', 'Detail Pendidikan Dosen')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Detail Pendidikan - {{ $dosen->nama }}</h4>
    </div>
    <div class="card-body">
        <a href="{{ route('pendidikan.create', $dosen->id) }}" class="btn btn-primary mb-3">
            Tambah Pendidikan
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenjang</th>
                    <th>Nama Instansi</th>
                    <th>Jurusan</th>
                    <th>Tanggal Lulus</th>
                    <th>Gelar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pendidikan as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_jenjang }}</td>
                    <td>{{ $p->nama_sekolah }}</td>
                    <td>{{ $p->jurusan }}</td>
                    <td>{{ $p->tgl_lulus }}</td>
                    <td>{{ $p->gelar }}</td>
                    <td>
                        @if($p->id)
                            <a href="{{ route('pendidikan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pendidikan.destroy', $p->id) }}" method="POST" style="display:inline-block;">
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
                    <td colspan="6" class="text-center">Belum ada data pendidikan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

