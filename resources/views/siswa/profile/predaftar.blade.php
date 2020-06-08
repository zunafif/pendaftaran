@extends('layouts.siswa')

@section('titlePage')
    Data Diri
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                @if(Session::has('pesan'))
                    <p class="alert alert-{{ Session::get('jenis') }}">{!! Session::get('pesan') !!}</p>
                @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div><br />
                    @endif
                <form method="post" action="{{ route('siswa.predaftarProses') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <h3 class=""><b>Data Siswa</b></h3>
                        <div class="form-row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" name="nama" value="{{ $siswa->nama }}" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email" value="{{ $siswa->email }}" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" placeholder="Masukkan Alamat lengkap beserta RT dan RW" name="alamat" required>{{ $siswa->alamat }}</textarea>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control cdp" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" value="{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('Y-m-d') }}" required>
                                      </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select id="jenis_kelamin" class="form-control" style="width: 100%;" name="jenis_kelamin" value="{{ $siswa->jenis_kelamin }}" required>
                                            <option value="none" selected disabled hidden> Pilih Jenis Kelamin </option>
                                            <option value="L" @if ($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                            <option value="P" @if ($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control select2" value="{{ $siswa->agama }}" required>
                                        <option value="none" selected disabled hidden>Pilih Agama</option>
                                        <option value="Islam" @if ($siswa->agama == 'Islam') selected @endif>Islam</option>
                                        <option value="Kristen Katolik" @if ($siswa->agama == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                        <option value="Kristen Protestan" @if ($siswa->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                        <option value="Hindu" @if ($siswa->agama == 'Hindu') selected @endif>Hindu</option>
                                        <option value="Buddha" @if ($siswa->agama == 'Buddha') selected @endif>Buddha</option>
                                        <option value="Kong Hu Cu" @if ($siswa->agama == 'Kong Hu Cu') selected @endif>Kong Hu Cu</option>
                                    </select>
                                </div>
                            </div>
                                    <div class="form-group col-md-6">
                                        <label for="anak_ke">Anak Ke-</label>
                                        <input type="text" class="form-control" id="anak_ke" name="anak_ke" value="{{ $siswa->anak_ke }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kewarganegaraan">Kewarganegaraan</label>
                                        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="{{ $siswa->kewarganegaraan }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <p class="h6 mt-2 alert-warning p-2" >*Upload foto 3x4 Formal ukuran file maksimal 2 MB</p>
                                <div class="card">
                                    <div class="imgWrap">
                                        @if($siswa->foto == null)
                                            <img id="image-preview" src="{{ url('img/user.png') }}" class="card-img-top img-fluid" width="100px" />
                                        @else
                                            <img id="image-preview" src="{{ url('file/siswa/' . $siswa->id_siswa . '/' . $siswa->foto) }}" class="card-img-top img-fluid" width="100px" />
                                        @endif
                                    </div>

                                    <div class="card-body">
                                        <div class="custom-file">
                                            <input type="file" name="foto" id="image-source" onchange="previewImage();" class="custom-file-input" accept="image/*">
                                            <label class="custom-file-label" id="namafile" for="inputFile">Foto</label>
                                        </div>
                                    </div>
                                    <script>
                                        function previewImage() {
                                            document.getElementById("image-preview").style.display = "block";
                                            var oFReader = new FileReader();
                                            oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

                                            oFReader.onload = function(oFREvent) {
                                                document.getElementById("image-preview").src = oFREvent.target.result;
                                            };
                                        };
                                        $(document).ready(function() {
                                            $('input[type="file"]').change(function(e) {
                                                var geekss = e.target.files[0].name;
                                                $("namafile").text(geekss);
                                                document.getElementById("namafile").innerHTML = geekss;
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="asal_smp">Asal SMP</label>
                                <input type="text" class="form-control" id="asal_smp" placeholder="Masukkan Asal SMP" name="asal_smp" value="{{ $siswa->asal_smp }}" required>
                            </div>
                        </div>

                        <h3 class="mt-5"><b>Data Orang Tua</b></h3>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control" id="nama_ayah" placeholder="Masukkan Nama Ayah" name="nama_ayah" value="{{ $siswa->nama_ayah }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" placeholder="Masukkan Nama Ibu" name="nama_ibu" value="{{ $siswa->nama_ibu }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tempat_lahir_ayah">Tempat Lahir Ayah</label>
                                <input type="text" class="form-control" id="tempat_lahir_ayah" placeholder="Masukkan Tempat Lahir Ayah" name="tempat_lahir_ayah" value="{{ $siswa->tempat_lahir_ayah }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tempat_lahir_ibu">Tempat Lahir Ibu</label>
                                <input type="text" class="form-control" id="tempat_lahir_ibu" placeholder="Masukkan Tempat Lahir Ibu" name="tempat_lahir_ibu" value="{{ $siswa->tempat_lahir_ibu }}" required>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
                                    <input type="date" class="form-control cdp" id="tanggal_lahir_ayah" placeholder="Masukkan Tanggal Lahir Ayah" name="tanggal_lahir_ayah" value="{{ \Carbon\Carbon::parse($siswa->tanggal_lahir_ayah)->format('Y-m-d') }}" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir_ibu">Tanggal Lahir Ibu</label>
                                    <input type="date" class="form-control cdp" id="tanggal_lahir_ibu" placeholder="Masukkan Tanggal Lahir Ibu" name="tanggal_lahir_ibu" value="{{ \Carbon\Carbon::parse($siswa->tanggal_lahir_ibu)->format('Y-m-d') }}" required>
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kewarganegaraan_ayah">Kewarganegaraan Ayah</label>
                                <input type="text" class="form-control" id="kewarganegaraan_ayah" placeholder="Masukkan Kewarganegaraan Ayah" name="kewarganegaraan_ayah" value="{{ $siswa->kewarganegaraan_ayah }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kewarganegaraan_ibu">Kewarganegaraan Ibu</label>
                                <input type="text" class="form-control" id="kewarganegaraan_ibu" placeholder="Masukkan Kewarganegaraan Ibu" name="kewarganegaraan_ibu" value="{{ $siswa->kewarganegaraan_ibu }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="agama_ayah">Agama Ayah</label>
                                <select name="agama_ayah" class="form-control select2" value="{{ $siswa->agama_ayah }}" required>
                                    <option value="none" selected disabled hidden>Pilih Agama</option>
                                    <option value="Islam" @if ($siswa->agama == 'Islam') selected @endif>Islam</option>
                                    <option value="Kristen Katolik" @if ($siswa->agama == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                    <option value="Kristen Protestan" @if ($siswa->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                    <option value="Hindu" @if ($siswa->agama == 'Hindu') selected @endif>Hindu</option>
                                    <option value="Buddha" @if ($siswa->agama == 'Buddha') selected @endif>Buddha</option>
                                    <option value="Kong Hu Cu" @if ($siswa->agama == 'Kong Hu Cu') selected @endif>Kong Hu Cu</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="agama_ibu">Agama Ibu</label>
                                <select name="agama_ibu" class="form-control select2" value="{{ $siswa->agama_ibu }}" required>
                                    <option value="none" selected disabled hidden>Pilih Agama</option>
                                    <option value="Islam" @if ($siswa->agama == 'Islam') selected @endif>Islam</option>
                                    <option value="Kristen Katolik" @if ($siswa->agama == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                    <option value="Kristen Protestan" @if ($siswa->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                    <option value="Hindu" @if ($siswa->agama == 'Hindu') selected @endif>Hindu</option>
                                    <option value="Buddha" @if ($siswa->agama == 'Buddha') selected @endif>Buddha</option>
                                    <option value="Kong Hu Cu" @if ($siswa->agama == 'Kong Hu Cu') selected @endif>Kong Hu Cu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pendidikan_ayah">Pendidikan Terakhir Ayah</label>
                                <select name="pendidikan_ayah" class="form-control" value="{{ $siswa->pendidikan_ayah }}" required>
                                    <option value="" selected disabled hidden>Pilih Pendidikan Ayah...</option>
                                    <option value="0" @if ($siswa->pendidikan_ayah == 0) selected @endif>Tidak Sekolah</option>
                                    <option value="1" @if ($siswa->pendidikan_ayah == 1) selected @endif>Putus SD</option>
                                    <option value="2" @if ($siswa->pendidikan_ayah == 2) selected @endif>SD Sederajat</option>
                                    <option value="3" @if ($siswa->pendidikan_ayah == 3) selected @endif>SMP Sederajat</option>
                                    <option value="4" @if ($siswa->pendidikan_ayah == 4) selected @endif>SMA Sederajat</option>
                                    <option value="5" @if ($siswa->pendidikan_ayah == 5) selected @endif>D1</option>
                                    <option value="6" @if ($siswa->pendidikan_ayah == 6) selected @endif>D2</option>
                                    <option value="7" @if ($siswa->pendidikan_ayah == 7) selected @endif>D3</option>
                                    <option value="8" @if ($siswa->pendidikan_ayah == 8) selected @endif>D4/S1</option>
                                    <option value="9" @if ($siswa->pendidikan_ayah == 9) selected @endif>S2</option>
                                    <option value="10" @if ($siswa->pendidikan_ayah == 10) selected @endif>S3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pendidikan_ibu">Pendidikan Terakhir Ibu</label>
                                <select name="pendidikan_ibu" class="form-control" value="{{ $siswa->pendidikan_ibu }}" required>
                                    <option value="" selected disabled hidden>Pilih Pendidikan Ibu...</option>
                                    <option value="0" @if ($siswa->pendidikan_ibu == 0) selected @endif>Tidak Sekolah</option>
                                    <option value="1" @if ($siswa->pendidikan_ibu == 1) selected @endif>Putus SD</option>
                                    <option value="2" @if ($siswa->pendidikan_ibu == 2) selected @endif>SD Sederajat</option>
                                    <option value="3" @if ($siswa->pendidikan_ibu == 3) selected @endif>SMP Sederajat</option>
                                    <option value="4" @if ($siswa->pendidikan_ibu == 4) selected @endif>SMA Sederajat</option>
                                    <option value="5" @if ($siswa->pendidikan_ibu == 5) selected @endif>D1</option>
                                    <option value="6" @if ($siswa->pendidikan_ibu == 6) selected @endif>D2</option>
                                    <option value="7" @if ($siswa->pendidikan_ibu == 7) selected @endif>D3</option>
                                    <option value="8" @if ($siswa->pendidikan_ibu == 8) selected @endif>D4/S1</option>
                                    <option value="9" @if ($siswa->pendidikan_ibu == 9) selected @endif>S2</option>
                                    <option value="10" @if ($siswa->pendidikan_ibu == 10) selected @endif>S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pekerjaan_ayah">Pekerjaaan Ayah</label>
                                <select name="pekerjaan_ayah" class="form-control" value="{{ $siswa->pekerjaan_ayah }}" required>
                                    <option value="" selected disabled hidden>Pilih Pekerjaaan Ayah...</option>
                                    <option value="0" @if ($siswa->pekerjaan_ayah == 0) selected @endif>Tidak Bekerja</option>
                                    <option value="1" @if ($siswa->pekerjaan_ayah == 1) selected @endif>Nelayan</option>
                                    <option value="2" @if ($siswa->pekerjaan_ayah == 2) selected @endif>Petani</option>
                                    <option value="3" @if ($siswa->pekerjaan_ayah == 3) selected @endif>Peternak</option>
                                    <option value="4" @if ($siswa->pekerjaan_ayah == 4) selected @endif>PNS/TNI/Polri</option>
                                    <option value="5" @if ($siswa->pekerjaan_ayah == 5) selected @endif>Karyawan Swasta</option>
                                    <option value="6" @if ($siswa->pekerjaan_ayah == 6) selected @endif>Pedagang Kecil</option>
                                    <option value="7" @if ($siswa->pekerjaan_ayah == 7) selected @endif>Pedagang Besar</option>
                                    <option value="8" @if ($siswa->pekerjaan_ayah == 8) selected @endif>Wiraswasta</option>
                                    <option value="9" @if ($siswa->pekerjaan_ayah == 9) selected @endif>Wirausaha</option>
                                    <option value="10" @if ($siswa->pekerjaan_ayah == 10) selected @endif>Buruh</option>
                                    <option value="11" @if ($siswa->pekerjaan_ayah == 11) selected @endif>Pensiunan</option>
                                    <option value="12" @if ($siswa->pekerjaan_ayah == 12) selected @endif>Meninggal Dunia</option>
                                    <option value="13" @if ($siswa->pekerjaan_ayah == 13) selected @endif>Lain - Lain</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <select name="pekerjaan_ibu" class="form-control" value="{{ $siswa->pekerjaan_ibu }}" required>
                                    <option value="" selected disabled hidden>Pilih Pekerjaan Ibu...</option>
                                    <option value="0" @if ($siswa->pekerjaan_ibu == 0) selected @endif>Tidak Bekerja</option>
                                    <option value="1" @if ($siswa->pekerjaan_ibu == 1) selected @endif>Nelayan</option>
                                    <option value="2" @if ($siswa->pekerjaan_ibu == 2) selected @endif>Petani</option>
                                    <option value="3" @if ($siswa->pekerjaan_ibu == 3) selected @endif>Peternak</option>
                                    <option value="4" @if ($siswa->pekerjaan_ibu == 4) selected @endif>PNS/TNI/Polri</option>
                                    <option value="5" @if ($siswa->pekerjaan_ibu == 5) selected @endif>Karyawan Swasta</option>
                                    <option value="6" @if ($siswa->pekerjaan_ibu == 6) selected @endif>Pedagang Kecil</option>
                                    <option value="7" @if ($siswa->pekerjaan_ibu == 7) selected @endif>Pedagang Besar</option>
                                    <option value="8" @if ($siswa->pekerjaan_ibu == 8) selected @endif>Wiraswasta</option>
                                    <option value="9" @if ($siswa->pekerjaan_ibu == 9) selected @endif>Wirausaha</option>
                                    <option value="10" @if ($siswa->pekerjaan_ibu == 10) selected @endif>Buruh</option>
                                    <option value="11" @if ($siswa->pekerjaan_ibu == 11) selected @endif>Pensiunan</option>
                                    <option value="12" @if ($siswa->pekerjaan_ibu == 12) selected @endif>Meninggal Dunia</option>
                                    <option value="13"@if ($siswa->pekerjaan_ibu == 13) selected @endif>Lain - Lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomor_telp_ayah">Nomor Telp. Ayah(Opsional)</label>
                                <input type="text" class="form-control" id="nomor_telp_ayah" placeholder="Masukkan Nomor HP Ayah" name="nomor_telp_ayah" value="{{ $siswa->nomor_telp_ayah }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nomor_telp_ibu">Nomor Telp. Ibu(Opsional)</label>
                                <input type="text" class="form-control" id="nomor_telp_ibu" placeholder="Masukkan Nomor HP Ibu" name="nomor_telp_ibu" value="{{ $siswa->nomor_telp_ibu }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="alamat">Alamat Ayah(Opsional)</label>
                                <textarea class="form-control" id="alamat_ayah" placeholder="Masukkan Alamat lengkap beserta RT dan RW" name="alamat_ayah">{{ $siswa->alamat_ayah }}</textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="alamat">Alamat Ibu(Opsional)</label>
                                <textarea class="form-control" id="alamat_ibu" placeholder="Masukkan Alamat lengkap beserta RT dan RW" name="alamat_ibu">{{ $siswa->alamat_ibu }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
