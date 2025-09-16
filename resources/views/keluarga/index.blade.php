@extends('adminlte::page')

@section('page-title', 'Daftar Keluarga Dosen')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4>Daftar Keluarga Dosen</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dosen</th>
                    <th>NIDN</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                @php
                    // Group berdasarkan id_dosen
                    $grouped = $dosen->groupBy('id_dosen');
                @endphp

                @foreach($grouped as $id_dosen => $items)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $items->first()->nama_dosen }}</td>
                    <td>{{ $items->first()->nidn }}</td>
                    <td>
                        <a href="{{ route('keluarga.show', $id_dosen) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
