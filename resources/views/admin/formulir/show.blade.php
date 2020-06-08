@extends('layouts.app')

@section('titlePage')
    Lihat Daftar Ulang
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">

            <table class="table bordered">
                <tr>
                    <td>Nomor Pendaftaran</td>
                    <td>:</td>
                    <td>{{ $formulir->id_pendaftaran }}</td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td>{{ $formulir->nisn }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $formulir->nama }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $formulir->alamat }}</td>
                </tr>
                <tr>
                    <td>TTL </td>
                    <td>:</td>
                    <td>{{ $formulir->tempat_lahir }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d', $formulir->tanggal_lahir)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin </td>
                    <td>:</td>
                    <td>{{ $formulir->jenis_kelamin == 'L' ? "Laki - Laki" : "Perempuan" }}</td>
                </tr>
                <tr>
                    <td>Agama </td>
                    <td>:</td>
                    <td>{{ $formulir->agama }}</td>
                </tr>
                <tr>
                    <td>Asal Sekolah </td>
                    <td>:</td>
                    <td>{{ $formulir->asal_smp }}</td>
                </tr>
                <tr>
                    <td>foto </td>
                    <td>:</td>
                    <td><img src="{{ url('file/siswa/' . $formulir->id_siswa . '/' . $formulir->foto) }}" alt="Foto Siswa" style="width: 300px; height: auto;"></td>
                </tr>

                <tr>
                    <td>Nama Ayah</td>
                    <td>:</td>
                    <td>{{ $formulir->nama_ayah }}</td>
                </tr>
                <tr>
                    <td>Pendidikan Ayah</td>
                    <td>:</td>
                    <td>
                        <?php
                            switch($formulir->pendidikan_ayah){
                                case 0:
                                    echo "Tidak Sekolah";
                                    break;
                                case 1:
                                    echo "Putus SD";
                                    break;
                                case 2:
                                    echo "SD Sederajat";
                                    break;
                                case 3:
                                    echo "SMP Sederajat";
                                    break;
                                case 4:
                                    echo "SMA Sederajat";
                                    break;
                                case 5:
                                    echo "D1";
                                    break;
                                case 6:
                                    echo "D2";
                                    break;
                                case 7:
                                    echo "D3";
                                    break;
                                case 8:
                                    echo "D4/S1";
                                    break;
                                case 9:
                                    echo "S1";
                                    break;
                                case 10:
                                    echo "S2";
                                    break;
                                case 11:
                                    echo "S3";
                                    break;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Pekerjaan Ayah</td>
                    <td>:</td>
                    <td>
                        <?php
                            switch($formulir->pekerjaan_ayah){
                                case 0:
                                    echo "Tidak Bekerja";
                                    break;
                                case 1:
                                    echo "Nelayan";
                                    break;
                                case 2:
                                    echo "Petani";
                                    break;
                                case 3:
                                    echo "Peternak";
                                    break;
                                case 4:
                                    echo "PNS/TNI/Polri";
                                    break;
                                case 5:
                                    echo "Karyawan Swasta";
                                    break;
                                case 6:
                                    echo "Pedagang Kecil";
                                    break;
                                case 7:
                                    echo "Pedagang Besar";
                                    break;
                                case 8:
                                    echo "Wiraswasta";
                                    break;
                                case 9:
                                    echo "Wirausaha";
                                    break;
                                case 10:
                                    echo "Buruh";
                                    break;
                                case 11:
                                    echo "Pensiunan";
                                    break;
                                case 12:
                                    echo "Meninggal Dunia";
                                    break;
                                case 13:
                                    echo "Lain-Lain";
                                    break;
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Nama Ibu</td>
                    <td>:</td>
                    <td>{{ $formulir->nama_ibu }}</td>
                </tr>
                <tr>
                    <td>Pendidikan Ibu</td>
                    <td>:</td>
                    <td>
                        <?php
                            switch($formulir->pendidikan_ibu){
                                case 0:
                                    echo "Tidak Sekolah";
                                    break;
                                case 1:
                                    echo "Putus SD";
                                    break;
                                case 2:
                                    echo "SD Sederajat";
                                    break;
                                case 3:
                                    echo "SMP Sederajat";
                                    break;
                                case 4:
                                    echo "SMA Sederajat";
                                    break;
                                case 5:
                                    echo "D1";
                                    break;
                                case 6:
                                    echo "D2";
                                    break;
                                case 7:
                                    echo "D3";
                                    break;
                                case 8:
                                    echo "D4/S1";
                                    break;
                                case 9:
                                    echo "S1";
                                    break;
                                case 10:
                                    echo "S2";
                                    break;
                                case 11:
                                    echo "S3";
                                    break;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Pekerjaan Ibu</td>
                    <td>:</td>
                    <td>
                        <?php
                            switch($formulir->pekerjaan_ibu){
                                case 0:
                                    echo "Tidak Bekerja";
                                    break;
                                case 1:
                                    echo "Nelayan";
                                    break;
                                case 2:
                                    echo "Petani";
                                    break;
                                case 3:
                                    echo "Peternak";
                                    break;
                                case 4:
                                    echo "PNS/TNI/Polri";
                                    break;
                                case 5:
                                    echo "Karyawan Swasta";
                                    break;
                                case 6:
                                    echo "Pedagang Kecil";
                                    break;
                                case 7:
                                    echo "Pedagang Besar";
                                    break;
                                case 8:
                                    echo "Wiraswasta";
                                    break;
                                case 9:
                                    echo "Wirausaha";
                                    break;
                                case 10:
                                    echo "Buruh";
                                    break;
                                case 11:
                                    echo "Pensiunan";
                                    break;
                                case 12:
                                    echo "Meninggal Dunia";
                                    break;
                                case 13:
                                    echo "Lain-Lain";
                                    break;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Mendaftar  </td>
                    <td>:</td>
                    <td>{{ $formulir->nama_gelombang }} {{ $formulir->nama_jurusan }}</td>
                </tr>
                <tr>
                    <td>Dokumen  </td>
                    <td>:</td>
                    <td>
                        <ul>
                            @foreach($dokumen as $d)
                                <li>
                                    @if($dok_siswa[$loop->index] != null)
                                        <span style="color:green;font-weight:bold;">[✓]</span> <a href="{{ url('file/siswa/' . $dok_siswa[$loop->index]['siswa_id'] . '/' . $dok_siswa[$loop->index]['file_dokumen']) }}" target="_blank">{{ $d->nama_dokumen  }}</a>
                                    @else
                                        <span style="color:red;font-weight:bold;">[✕]</span> Siswa Belum Mengupload Dokumen {{ $d->nama_dokumen }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Nilai  </td>
                    <td>:</td>
                    <td>
                        <ul>
                            @foreach($nilai as $n)
                                <li>
                                    @if($nil_siswa[$loop->index] != null)
                                        <span style="color:green;font-weight:bold;">[✓]</span> {{ $n->nama_nilai }} : {{ $nil_siswa[$loop->index]['nilai'] }}
                                    @else
                                        <span style="color:red;font-weight:bold;">[✕]</span> Siswa Belum Mengupload Nilai {{ $n->nama_nilai }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Bukti Pembayaran Formulir  </td>
                    <td>:</td>
                    <td>
                            @if($formulir->bukti_pembayaran != null)
                            <span style="color:green;font-weight:bold;">[✓]</span> <a href="{{ url('file/siswa/' . $formulir->siswa_id . '/' . $formulir->bukti_pembayaran) }}" target="_blank">Bukti Pembayaran</a>
                            @else
                            <span style="color:red;font-weight:bold;">[✕]</span> Siswa Belum mengupload Bukti Pembayaran
                            @endif
                    </td>
                </tr>
                <tr>
                    <td> </td>
                    <td></td>
                    <td>
                           @if($statusPendaftaran != null)
                                @if($statusPendaftaran->status_id == 1)
                                <span class="badge badge-success" style="line-height: normal;">Siswa Ini telah Di terima data silahkan cek Daftar Ulang</span>
                                @else
                                <span class="badge badge-warning" style="line-height: normal;">Siswa Ini Tidak Di terima</span>
                                @endif
                           @elseif($formulir->status_pembayaran == 1)
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.formulir.terima', $formulir->id_pendaftaran) }}" onclick="return confirm('Yakin ingin MENERIMA Siswa ini?')" ><i class="fas fa-check"></i> Terima Siswa Ini</a>
                           @else
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-check"></i> Verifikasi Pembayaran
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pembayaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Anda yakin Ingin Verifikasi Siswa Ini? Cek bukti Pendaftaran jika siswa menggunakan metode transfer. Jika menggunakan metode pembayaran diloket bisa langsung diverifikasi.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.formulir.verifikasi', $formulir->id_pendaftaran) }}"><i class="fas fa-check"></i> Verifikasi</a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                           @endif
                    </td>
                </tr>
            </table>
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
