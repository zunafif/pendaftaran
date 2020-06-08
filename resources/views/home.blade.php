@extends('layouts.app')

@section('titlePage')
    Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>40</h3>

                <p>Rp. 200.000,-</p>
            </div>
            <div class="small-box-footer">Formulir IPA</div>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>40</h3>

                <p>Rp. 200.000,-</p>
            </div>
            <div class="small-box-footer">Formulir IPS</div>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>40</h3>

                <p>Rp. 11.000.000,-</p>
            </div>
            <div class="small-box-footer">Pendaftaran IPA</div>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>40</h3>

                <p>Rp. 11.000.000,-</p>
            </div>
            <div class="small-box-footer">Pendaftaran IPS</div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Grand Total</h3>

                <p>Rp. 11.200.000,-</p>
            </div>
            <!-- <div class="small-box-footer">Formulir MM</div> -->
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $jurusan[0]->kuota }}</h3>
            </div>
            <div class="small-box-footer">Sisa Kuota IPA</div>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $jurusan[1]->kuota }}</h3>
            </div>
            <div class="small-box-footer">Sisa Kuota IPS</div>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3> IPA : -</h3>
                <h3> IPS : -</h3>
            </div>
            <div class="small-box-footer">Formulir Belum Kembali</div>
        </div>
    </div>
</div>
@endsection
