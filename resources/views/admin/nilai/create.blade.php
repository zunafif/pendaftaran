@extends('layouts.app')

@section('titlePage')
    Tambah Nilai
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <!-- form start -->
                <form method="post" action="{{ route('admin.nilai.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            @csrf

                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                    <label for="name">Nama Nilai:</label>
                                    <input type="text" class="form-control @error('Nilai') is-invalid @enderror" name="Nilai" value="{{ old('Nilai') }}" placeholder="Nama Nilai"/>
                                    @error('Nilai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
@endsection
