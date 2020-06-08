@extends('layouts.app')

@section('titlePage')
    Management Nilai
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{ route('admin.nilai.create') }}"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                        @if(Session::has('pesan'))
                            <p class="alert alert-{{ Session::get('jenis') }} mt-3">{{ Session::get('pesan') }}</p>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatables" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="3">No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nilai as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->nama_nilai}}</td>
                                    <td>@if($data->status == 1 )<span class="badge badge-success" style="line-height: normal;">Aktif</span> @else <span class="badge badge-secondary" style="line-height: normal;">Tidak Aktif</span>@endif</td>
                                    <td>
                                        <a class="btn {{ $data->status == 0 ? "btn-success" : "btn-warning" }} btn-xs" href="{{ route('admin.nilai.aktif', $data->id_nilai)}}" @if($data->status == 0) onclick="return confirm('Yakin ingin MENGAKTIFKAN Nilai ini?')" data-toggle="tooltip" data-placement="top" title="Aktifkan Nilai Ini" @else onclick="return confirm('Yakin ingin MENONAKTIFKAN Nilai ini?')" data-toggle="tooltip" data-placement="top" title="Nonaktifkan Nilai Ini" @endif>@if($data->status == 0)<i class="nav-icon fas fa-check"></i> Aktifkan @else <i class="nav-icon fas fa-times"></i> Nonaktifkan @endif</a>
                                        <a href="{{ route('admin.nilai.edit', $data->id_nilai)}}" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Nama Nilai"><i class="fas fa-edit"></i></a>
                                                        <form action="{{ route('admin.nilai.destroy', $data->id_nilai)}}" method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Yakin ingin MENGHAPUS Nilai ini?')" class="btn btn-xs btn-danger" type="submit" data-toggle="tooltip" data-placement="top" title="Hapus Nilai"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
