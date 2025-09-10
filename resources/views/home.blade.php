<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Dosen</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/') }}" class="nav-link">Home</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="brand-link">
            <span class="brand-text font-weight-light">Sistem Dosen</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                    <li class="nav-item">
                        <a href="{{ url('/dosen') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Data Master</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/pendidikan') }}" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>Riwayat Pendidikan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/pelatihan') }}" class="nav-link">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>Riwayat Sertifikat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/sertifikat') }}" class="nav-link">
                            <i class="nav-icon fas fa-certificate"></i>
                            <p>Riwayat Penghargaan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/cuti') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Riwayat Cuti</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/cuti') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Riwayat Pelatihan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/cuti') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Riwayat Hukuman</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/cuti') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Jabatan Fungsional</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/cuti') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Jabatan Struktural</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/cuti') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>SKP</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">@yield('page_title')</h1>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="main-footer text-center">
        <strong>&copy; {{ date('Y') }} Sistem Dosen.</strong> All rights reserved.
    </footer>

</div>

<!-- AdminLTE JS -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
