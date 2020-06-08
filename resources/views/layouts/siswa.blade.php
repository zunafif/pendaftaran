<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('titlePage') - PPDB {{ env("NAMASEKOLAH","") }}</title>
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
    <link href='{{ url('asset/logo.png') }}' rel='icon' type='image/x-icon' />
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a data-widget="pushmenu" href="#" class="btn btn-dark btn-sm mt-1"><i class="nav-icon fas fa-list-alt pr-1 p2-1"></i> Menu PPDB</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="{{ route('siswa.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-danger btn-sm mt-1">Logout<i class="nav-icon fas fa-sign-out-alt pl-2 pt-1"></i></a>
                <form id="logout-form" action="{{ route('siswa.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="brand-link text-center">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('siswa.predaftar') }}">
                    <img src="{{ url('asset/logo.png') }}" alt="SI-PPDB" class="mx-auto d-block nav-sidebar"
                     style="opacity: .8; width:150px; max-width: 100%;max-height: 100%;">
                </a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <a href="{{ route('siswa.predaftar') }}" style="color:#fff;font-size: 15px;"><p>{{ env("NAMASEKOLAH","") }}</p></a>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link" target="_blank">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Home
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('siswa.predaftar') }}" class="nav-link {{ Route::current()->getName() == 'siswa.predaftar' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                    Data Diri
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('siswa.dokumen') }}" class="nav-link {{ Route::current()->getName() == 'siswa.dokumen' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                    Dokumen
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('siswa.nilai') }}" class="nav-link {{ Route::current()->getName() == 'siswa.nilai' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                    Nilai
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('siswa.registrasi') }}" class="nav-link {{ Route::current()->getName() == 'siswa.registrasi' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                    Registrasi Pendaftaran
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('siswa.riwayat') }}" class="nav-link {{ Route::current()->getName() == 'siswa.riwayat' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-history"></i>
                    <p>
                    Riwayat Pendaftaran
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('siswa.angsuran') }}" class="nav-link {{ Route::current()->getName() == 'siswa.angsuran' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-credit-card "></i>
                    <p>
                    Angsuran
                    </p>
                </a>
            </li>

            <li class="nav-item" style="margin-bottom:200px;">
                <a href="{{ route('siswa.ubahkatasandi') }}" class="nav-link {{ Route::current()->getName() == 'siswa.ubahkatasandi' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-key"></i>
                    <p>
                    Ubah Kata Sandi
                    </p>
                </a>
            </li>
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('titlePage')</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="if.itats.ac.id">Informatika ITATS KKN 2020</a>.</strong>
    All rights reserved.
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>

    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#datatables").DataTable();
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });

            $('input[class="cdp"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1991,
                maxYear: parseInt(moment().format('YYYY'),10)
            });

            $('.selectize').selectize({
                create: true,
                sortField: 'text'
            });

            $('.multi-selectize').selectize({
                maxItems: 17
            });

        });
    </script>
    <!-- DataTables -->
</body>
</html>
