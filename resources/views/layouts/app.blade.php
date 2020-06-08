<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titlePage') - SI-PPDB</title>
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css">
    <link href='{{ url('asset/logo.png') }}' rel='icon' type='image/x-icon' />
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a data-widget="pushmenu" href="#" class="btn btn-dark btn-sm mt-1"><i class="nav-icon fas fa-list-alt pr-1 p2-1"></i> Menu Admin</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger btn-sm mt-1">Logout<i class="nav-icon fas fa-sign-out-alt pl-2 pt-1"></i></a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
{{--        <img src="dist/img/AdminLTELogo.png" alt="SI-PPDB" class="brand-image img-circle elevation-3"--}}
{{--            style="opacity: .8">--}}
        <a href="{{ route('admin.home') }}" class="brand-link">
            <span class="brand-text font-weight-light ml-2"><i class="nav-icon fas fa-home mr-2"></i> SI-PPDB</span>
        </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">PPDB</li>
            <!-- <li class="nav-item">
                <a href="{{ route('admin.status') }}" class="nav-link {{ Route::current()->getName() == 'admin.status' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Status
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.informasi') }}" class="nav-link {{ Route::current()->getName() == 'admin.informasi' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Informasi
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.fitur') }}" class="nav-link {{ Route::current()->getName() == 'admin.fitur' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Fitur
                    </p>
                </a>
            </li> -->

            <li class="nav-item">
                <a href="{{ route('admin.tahunajaran') }}" class="nav-link {{ Route::current()->getName() == 'admin.tahunajaran' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                    Tahun Ajaran
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.jurusan') }}" class="nav-link {{ Route::current()->getName() == 'admin.jurusan' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                    Jurusan
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.gelombang') }}" class="nav-link {{ Route::current()->getName() == 'admin.gelombang' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                    Gelombang
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.biayagelombang') }}" class="nav-link {{ Route::current()->getName() == 'admin.biayagelombang' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>
                    Biaya Gelombang
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.dokumen') }}" class="nav-link {{ Route::current()->getName() == 'admin.dokumen' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-pdf"></i>
                    <p>
                    Dokumen
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.nilai') }}" class="nav-link {{ Route::current()->getName() == 'admin.nilai' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book-open"></i>
                    <p>
                    Nilai
                    </p>
                </a>
            </li>
            <li class="nav-header">Pendaftaran</li>
            <li class="nav-item">
                <a href="{{ route('admin.siswa') }}" class="nav-link {{ Route::current()->getName() == 'admin.siswa' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                    Siswa
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.formulir') }}" class="nav-link {{ Route::current()->getName() == 'admin.formulir' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-upload"></i>
                    <p>
                    Formulir
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.daftarulang') }}" class="nav-link {{ Route::current()->getName() == 'admin.daftarulang' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-id-card"></i>
                    <p>
                    Daftar Ulang
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.unduhpresensi') }}" class="nav-link {{ Route::current()->getName() == 'admin.unduhpresensi' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-download"></i>
                    <p>
                    Unduh Presensi
                    </p>
                </a>
            </li>

            <li class="nav-header">Angsuran</li>
            <li class="nav-item">
                <a href="{{ route('admin.kategoriangsuran') }}" class="nav-link {{ Route::current()->getName() == 'admin.kategoriangsuran' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-alt "></i>
                    <p>
                    Kategori Angsuran
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.angsuran') }}" class="nav-link {{ Route::current()->getName() == 'admin.angsuran' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-credit-card "></i>
                    <p>
                    Angsuran
                    </p>
                </a>
            </li>



            <li class="nav-header">Settings</li>
            <li class="nav-item" style="margin-bottom:200px;">
                <a href="{{ route('admin.ubahkatasandi') }}" class="nav-link {{ Route::current()->getName() == 'admin.ubahkatasandi' ? 'active' : '' }}">
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

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
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

            $(".uang").mask('000.000.000', {reverse: true});
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $('.selectize').selectize({
            create: true,
            sortField: 'text'
        });


    </script>
    <!-- DataTables -->
</body>
</html>
