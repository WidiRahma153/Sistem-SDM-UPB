@extends("adminlte::page")

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="mb-3"><i>Selamat Datang {{ Auth::user()->name }} di Sistem Informasi SDM Dosen Universitas Putra Bangsa</i></h4>
        <p class="mb-0">
          Kelola biodata, jabatan, pendidikan, dan kinerja dosen dalam satu sistem.
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
