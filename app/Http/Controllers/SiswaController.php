<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Dokumen;
use App\Nilai;
use App\KomponenDokumen;
use App\KomponenNilai;
use App\Pendaftaran;
use App\Pembayaran;
use App\Gelombang;
use App\StatusPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use PDF;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class SiswaController extends Controller
{
    private $except = [
        'nomor_telp_ayah',
        'nomor_telp_ibu',
        'alamat_ayah',
        'alamat_ibu',
        'nomor_hp',
    ];

    public function predaftar(){
        $nisn = \Auth::guard('siswa')->user()->nisn;
        $siswa = Siswa::where('nisn', $nisn)->first();
        return view('siswa.profile.predaftar', compact('siswa'));
    }

    public function predaftarProses(Request $req){
        $siswa = \Auth::guard('siswa')->user();
        $req->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'asal_smp' => 'required',
            'anak_ke' => 'required',
            'nomor_telp_ayah' => 'nullable',
            'nomor_telp_ibu' => 'nullable',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'tempat_lahir_ibu' => 'required',
            'tempat_lahir_ayah' => 'required',
            'tanggal_lahir_ibu' => 'required',
            'tanggal_lahir_ayah' => 'required',
            'agama_ibu' => 'required',
            'agama_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pendidikan_ibu' => 'required',
            'kewarganegaraan_ayah' => 'required',
            'kewarganegaraan_ibu' => 'required',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ayah' => 'nullable',
            'alamat_ibu' => 'nullable'
        ]);

        if($req->hasFile('foto')){
            $req->validate([
                'foto' => 'image|mimes:jpg,png,jpeg|max:2048',
            ]);
            $file = $req->file('foto');
            $tujuan = 'file/siswa/' . $siswa->id_siswa . '/';
            $nama_files = $siswa->nisn . '_' . 'foto'  . '.' . $file->getClientOriginalExtension();
            $file->move($tujuan, $nama_files);

            Siswa::where('id_siswa',$siswa->id_siswa)
            ->update([
                'foto' => $nama_files
            ]);
        }


        Siswa::where('id_siswa',$siswa->id_siswa)
            ->update([
                'nama' => $req->nama,
                'email' => $req->email,
                'alamat' => $req->alamat,
                'tempat_lahir' => $req->tempat_lahir,
                'tanggal_lahir' => $req->tanggal_lahir,
                'jenis_kelamin' => $req->jenis_kelamin,
                'kewarganegaraan' => $req->kewarganegaraan,
                'agama' => $req->agama,
                'anak_ke' => $req->anak_ke,
                'asal_smp' => $req->asal_smp,
                'nomor_telp_ayah' => $req->nomor_telp_ayah,
                'nomor_telp_ibu' => $req->nomor_telp_ibu,
                'nama_ayah' => $req->nama_ayah,
                'nama_ibu' => $req->nama_ibu,
                'kewarganegaraan_ayah' => $req->kewarganegaraan_ayah,
                'kewarganegaraan_ibu' => $req->kewarganegaraan_ibu,
                'agama_ayah' => $req->agama_ayah,
                'agama_ibu' => $req->agama_ibu,
                'tempat_lahir_ayah' => $req->tempat_lahir_ayah,
                'tempat_lahir_ibu' => $req->tempat_lahir_ibu,
                'tanggal_lahir_ayah' => $req->tanggal_lahir_ayah,
                'tanggal_lahir_ibu' => $req->tanggal_lahir_ibu,
                'pendidikan_ayah' => $req->pendidikan_ayah,
                'pendidikan_ibu' => $req->pendidikan_ibu,
                'pekerjaan_ayah' => $req->pekerjaan_ayah,
                'pekerjaan_ibu' => $req->pekerjaan_ibu,
                'alamat_ayah' => $req->alamat_ayah,
                'alamat_ibu' => $req->alamat_ibu
            ]);

        return redirect()->route('siswa.predaftar')->with(['jenis' => 'success',
            'pesan' => 'Berhasil menyimpan data diri : Silahkan melanjutkan ke menu <a href="' . route('siswa.dokumen') . '"><b>Selanjutnya<b></a>'
        ]);
    }

    public function dokumenView(){
        $siswa = \Auth::guard('siswa')->user();

        foreach($siswa->toArray() as $key => $value)
        {
            if (!in_array($key, $this->except)) {
                if($value == null){
                    $message = 'Anda harus melengkapi data diri terlebih dahulu';

                    if ($key == 'foto') {
                        $message = 'Anda Belum Meng-upload foto';
                    }

                    return redirect()->route('siswa.predaftar')->with(['jenis' => 'danger','pesan' => $message]);
                }
            }
        }

        $dokumen = Dokumen::where('status', '1')
                            ->get();

        $fileName = [];
        foreach($dokumen as $d){
            $nama_dokumen = KomponenDokumen::where('siswa_id', $siswa->id_siswa)->where('dokumen_id', $d->id_dokumen)->first();
            if($nama_dokumen){
                array_push($fileName, [$nama_dokumen->file_dokumen, $nama_dokumen->komentar_dokumen]);
            }else{
                array_push($fileName, null);
            }
        }

        return view('siswa.dokumen.dokumen', compact('dokumen','fileName'));
    }

    public function dokumenProses(Request $req){
        $siswa = \Auth::guard('siswa')->user();

        if($siswa->nama == null){
            return redirect()->route('siswa.predaftar')->with(['jenis' => 'danger','pesan' => 'Anda harus mengisi data diri terlebih']);
        }
        $req->validate([
            'id_dokumen' => 'required',
            'file' => 'required|mimes:jpg,png,jpeg,pdf|max:20000',
            'nama_dokumen' => 'required'
        ]);

        $cekDokumen = KomponenDokumen::where('siswa_id', $siswa->id_siswa)->where('dokumen_id', $req->id_dokumen)->first();

        if(!$cekDokumen){
            $file = $req->file('file');
            $tujuan = 'file/siswa/' . $siswa->id_siswa . '/';
            $nama_files = $siswa->nisn . '_' . str_replace(str_split("/\\:*?\"<>|"),'',strtoupper($req->nama_dokumen))  . '.' . $file->getClientOriginalExtension();
            $file->move($tujuan, $nama_files);

            KomponenDokumen::create([
                'file_dokumen' => $nama_files,
                'komentar_dokumen' => '',
                'siswa_id' => $siswa->id_siswa,
                'dokumen_id'=> $req->id_dokumen
            ]);

            return redirect()->back()->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Dokumen.']);
        }else{
            $file = $req->file('file');
            $tujuan = 'file/siswa/' . $siswa->id_siswa . '/';
            $nama_files = $siswa->nisn . '_' . str_replace(str_split("/\\:*?\"<>|"),'',strtoupper($req->nama_dokumen))  . '.' . $file->getClientOriginalExtension();

            $fileLama = $cekDokumen->file_dokumen;
            File::delete($tujuan . $fileLama);

            $file->move($tujuan, $nama_files);
            $cekDokumen->file_dokumen = $nama_files;
            $cekDokumen->save();

            return redirect()->back()->with(['jenis' => 'success','pesan' => 'Berhasil Mengubah Dokumen.']);
        }

        return redirect()->back();
    }

    public function nilaiView(){
        $nilai = Nilai::where('status', '1')->get();
        $siswa = \Auth::guard('siswa')->user();

        foreach($siswa->toArray() as $key => $value)
        {
            if (!in_array($key, $this->except)) {
                if($value == null){
                    return redirect()->route('siswa.predaftar')->with(['jenis' => 'danger','pesan' => 'Anda harus melengkapi data diri terlebih']);
                    die();
                }
            }
        }

        $nilaiNya = [];
        foreach($nilai as $n){
            $nama_nilai = KomponenNilai::where('siswa_id', $siswa->id_siswa)->where('nilai_id', $n->id_nilai)->first();
            if($nama_nilai){
                array_push($nilaiNya, $nama_nilai->nilai);
            }else{
                array_push($nilaiNya, null);
            }
        }

        return view('siswa.nilai.nilai', compact('nilai','nilaiNya'));
    }

    public function nilaiProses(Request $req){
        $siswa = \Auth::guard('siswa')->user();
        $req->validate([
            'id_nilai' => 'required',
            'nilai' => 'required'
        ]);

        $cekNilai = KomponenNilai::where('siswa_id', $siswa->id_siswa)->where('nilai_id', $req->id_nilai)->first();

        if(!$cekNilai){
            KomponenNilai::create([
                'nilai' => $req->nilai,
                'siswa_id' => $siswa->id_siswa,
                'nilai_id'=> $req->id_nilai
            ]);
        }else{
            $cekNilai->nilai = $req->nilai;
            $cekNilai->save();
        }

        return redirect()->back()->with(['jenis' => 'success','pesan' => 'Berhasil Mengubah Nilai.']);

    }

    public function registrasiView(){
        $siswa = \Auth::guard('siswa')->user();

        foreach($siswa->toArray() as $key => $value)
        {
            if (!in_array($key, $this->except)) {
                if($value == null){
                    return redirect()->route('siswa.predaftar')->with(['jenis' => 'danger','pesan' => 'Anda harus melengkapi data diri terlebih']);
                    die();
                }
            }
        }

        $gelombang = DB::table('biaya_gelombang')
                    ->select('jurusan.nama_jurusan','biaya_gelombang.id_biaya_gelombang', 'gelombang.*','tahun_ajaran.nama_tahun_ajaran')
                    ->join('jurusan', 'jurusan.id_jurusan','=','biaya_gelombang.jurusan_id')
                    ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
                    ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
                    ->where('tahun_ajaran.status' , '1')
                    ->where('gelombang.status' , '1')
                    ->get();

        $id = \Auth()->guard('siswa')->user()->id_siswa;
        $riwayat = DB::table('pendaftaran')
                    ->select('biaya_gelombang.id_biaya_gelombang')
                    ->join('biaya_gelombang', 'biaya_gelombang.id_biaya_gelombang','=','pendaftaran.biaya_gelombang_id')
                    ->join('jurusan', 'jurusan.id_jurusan','=','biaya_gelombang.jurusan_id')
                    ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
                    ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
                    ->where('siswa_id', $id)
                    ->get();

        $gel = [];
        $gelWaktu = [];
        $gelKuota = [];
        for($i = 0; $i < count($gelombang); $i++){
            if(!in_array($gelombang[$i]->nama_gelombang, $gel)){
                array_push($gel,$gelombang[$i]->nama_gelombang);
                array_push($gelKuota,$gelombang[$i]->kuota);
                array_push($gelWaktu,\Carbon\Carbon::parse($gelombang[$i]->mulai)->format('d M Y') ." s/d ". \Carbon\Carbon::parse($gelombang[$i]->selesai)->format('d M Y'));
            }
        }



        $sudahDaftar = [];
        foreach($riwayat as $r){
            array_push($sudahDaftar, $r->id_biaya_gelombang);
        }


        return view('siswa.registrasi.registrasi', compact('gelombang','sudahDaftar','gel','gelWaktu','gelKuota'));
    }

    public function registrasiProses(Request $req){
        $siswa = \Auth::guard('siswa')->user();
        $req->validate([
            'programstudi' => 'required'
        ]);

        $cekSudahDaftar = Pendaftaran::where('siswa_id', $siswa->id_siswa)->where('biaya_gelombang_id', $req->programstudi)->first();
        if(!$cekSudahDaftar){
            $pendaftaran = Pendaftaran::create([
                'nomor_ujian' => null,
                'biaya_gelombang_id' => $req->programstudi,
                'siswa_id' => $siswa->id_siswa,
                'admin_id' => null
            ]);

            Pembayaran::create([
                'pendaftaran_id' => $pendaftaran->id_pendaftaran,
                'bukti_pembayaran' => null,
                'jumlah' => null,
                'jenis_pembayaran' => '0',
                'metode_pembayaran' => null,
                'status_pembayaran' => null,
                'admin_id' => null,
            ]);

            $gelombang = DB::table('biaya_gelombang')
                ->select('gelombang.id_gelombang')
                ->join('gelombang','gelombang.id_gelombang','biaya_gelombang.gelombang_id')
                ->where('id_biaya_gelombang', $req->programstudi)
                ->first();

            Gelombang::where('id_gelombang',$gelombang->id_gelombang)->decrement('kuota');

            return redirect()->route('siswa.riwayat')->with(['jenis' => 'success','pesan' => 'Berhasil Mendaftar. Lakukan langkah selanjutnya dibawah ini']);
        }else{
            return redirect()->route('siswa.registrasi')->with(['jenis' => 'danger','pesan' => 'Anda sudah mendaftar gelombang ini. Cek di Riwayat Pendaftaran.']);
        }
    }

    public function riwayatView(){
        $siswa = \Auth::guard('siswa')->user();

        foreach($siswa->toArray() as $key => $value)
        {
            if (!in_array($key, $this->except)) {
                if($value == null){
                    return redirect()->route('siswa.predaftar')->with(['jenis' => 'danger','pesan' => 'Anda harus melengkapi data diri terlebih']);
                    die();
                }
            }
        }

        $id = \Auth()->guard('siswa')->user()->id_siswa;
        $riwayat = DB::table('pendaftaran')
                    ->select('pendaftaran.id_pendaftaran' ,'jurusan.nama_jurusan','biaya_gelombang.id_biaya_gelombang','biaya_gelombang.biaya', 'gelombang.nama_gelombang','tahun_ajaran.nama_tahun_ajaran')
                    ->join('biaya_gelombang', 'biaya_gelombang.id_biaya_gelombang','=','pendaftaran.biaya_gelombang_id')
                    ->join('jurusan', 'jurusan.id_jurusan','=','biaya_gelombang.jurusan_id')
                    ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
                    ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
                    ->where('siswa_id', $id)
                    ->get();

        $status = [];
        foreach($riwayat as $r){
            $s = 1;

            $cekBayarFormulir = Pembayaran::where('pendaftaran_id', $r->id_pendaftaran)->where('jenis_pembayaran', '0')->first();
            $cekDiterima = StatusPendaftaran::where('pendaftaran_id', $r->id_pendaftaran)->first();

            if($cekDiterima !=null){
                $cekBayarDaftarulang = Pembayaran::where('pendaftaran_id', $r->id_pendaftaran)->where('jenis_pembayaran', '1')->first();
                if($cekBayarDaftarulang->status_pembayaran == 1){
                   //Pembayaran Sudah Diverifikasi
                    $s = 7;
                }else if($cekDiterima->status_pembayaran == null && $cekBayarDaftarulang->bukti_pembayaran != null){
                     //sudah bayar formulilr nunggu verifikasi admin
                    $s = 6;
                }else if($cekDiterima->status_id == 1){
                    //diterima belum bayar
                    $s = 5;
                }else if($cekDiterima->status_id == 0){
                    //Siswa tidak diterima
                    $s = 8;
                }
            }else if($cekBayarFormulir->status_pembayaran == null && $cekBayarFormulir->bukti_pembayaran != null){
                $s=2;
            }else if($cekBayarFormulir->status_pembayaran == 1){
                //pembayaran formulir approved
                $s=3;
            }else if($cekBayarFormulir->status_pembayaran == 2 && $cekBayarFormulir->bukti_pembayaran != null){
                //Pembayaran not reject
                $s=4;
            }
            // }else if($cekBayarFormulir->status_pembayaran == 1){
            //     $s=2;
            // }else{
            //     $s=3;
            // }else if($cekBayarFormulir->status_pembayaran == 1){

            // }



            //  $cekBayarDaftarUlang = Pembayaran::where('pendaftaran_id', $r->id_pendaftaran)->where('jenis_pembayaran', '1')->first();
            // if($cekBayarDaftarUlang == null){

            // }else if($cekBayarDaftarUlang->status_pembayaran == 0){
            //     $s=4;
            // }else if($cekBayarDaftarUlang->status_pembayaran == 1){
            //     $s=5;
            // }
            array_push($status, $s);
        }


        return view('siswa.riwayat.riwayat',compact('riwayat','status'));
    }

    public function printFormulir($id){
        $formulir = DB::table('pendaftaran')
                    ->select('pendaftaran.*' ,'jurusan.*','biaya_gelombang.*', 'gelombang.*','tahun_ajaran.*','siswa.*')
                    ->join('biaya_gelombang', 'biaya_gelombang.id_biaya_gelombang','=','pendaftaran.biaya_gelombang_id')
                    ->join('jurusan', 'jurusan.id_jurusan','=','biaya_gelombang.jurusan_id')
                    ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
                    ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
                    ->join('siswa', 'siswa.id_siswa','=','pendaftaran.siswa_id')
                    ->first();

        $waktu = Carbon::now()->format('d M Y');

        $pdf = PDF::loadView('siswa.riwayat.print', compact('formulir','waktu'));
        $pdf->setOption('margin-top',4);
        $pdf->setOption('margin-bottom',2);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('Kwitansi-Formulir-Formulir.pdf');
    }

    public function bayarFormulir(Request $req){
        $siswa = \Auth::guard('siswa')->user();

        $req->validate([
            'id_pendaftaran' => 'required',
            'file' => 'required|mimes:jpg,png,jpeg,pdf|max:20000',
        ]);

        $pembayaran = Pembayaran::where('pendaftaran_id', $req->id_pendaftaran)->where('jenis_pembayaran', 0)->first();
        $pembayaran->metode_pembayaran = 1;

        if($pembayaran->bukti_pembayaran == null){
            $file = $req->file('file');
            $tujuan = 'file/siswa/' . $siswa->id_siswa . '/';
            $nama_files = $siswa->nisn . '_' . 'BUKTI_PEMBAYARAN_FORMULIR'  . '.' . $file->getClientOriginalExtension();
            $file->move($tujuan, $nama_files);
            $pembayaran->bukti_pembayaran = $nama_files;
            $pembayaran->save();
        }else{
            $file = $req->file('file');
            $tujuan = 'file/siswa/' . $siswa->id_siswa . '/';
            $nama_files = $siswa->nisn . '_' . 'BUKTI_PEMBAYARAN_FORMULIR'  . '.' . $file->getClientOriginalExtension();
            $fileLama = $pembayaran->bukti_pembayaran;
            File::delete($tujuan . $fileLama);
            $file->move($tujuan, $nama_files);
            $pembayaran->bukti_pembayaran = $nama_files;
            $pembayaran->save();
        }


        return redirect()->back()->with(['jenis' => 'success','pesan' => 'Berhasil Mengupload Bukti Pembayaran.']);
    }

    public function bayarDaftarUlang(Request $req){
        $siswa = \Auth::guard('siswa')->user();

        $req->validate([
            'id_pendaftaran' => 'required',
            'file' => 'required|max:20000',
        ]);

        $pembayaran = Pembayaran::where('pendaftaran_id', $req->id_pendaftaran)->where('jenis_pembayaran', 1)->first();
        $pembayaran->metode_pembayaran = 1;

        if($pembayaran->bukti_pembayaran == null){
            $file = $req->file('file');
            $tujuan = 'file/siswa/' . $siswa->id_siswa . '/';
            $nama_files = $siswa->nisn . '_' . 'BUKTI_PEMBAYARAN_DAFTARULANG'  . '.' . $file->getClientOriginalExtension();
            $file->move($tujuan, $nama_files);
            $pembayaran->bukti_pembayaran = $nama_files;
            $pembayaran->save();
        }else{
            $file = $req->file('file');
            $tujuan = 'file/siswa/' . $siswa->id_siswa . '/';
            $nama_files = $siswa->nisn . '_' . 'BUKTI_PEMBAYARAN_DAFTARULANG'  . '.' . $file->getClientOriginalExtension();
            $fileLama = $pembayaran->bukti_pembayaran;
            File::delete($tujuan . $fileLama);
            $file->move($tujuan, $nama_files);
            $pembayaran->bukti_pembayaran = $nama_files;
            $pembayaran->save();
        }


        return redirect()->back()->with(['jenis' => 'success','pesan' => 'Berhasil Mengupload Bukti Pembayaran.']);
    }

    public function ubahkatasandi(){
        return view('siswa.ubahkatasandi');
     }

     public function ubahkatasandiProses(Request $req){
         $this->validate($req, [
             'sandi' => 'required',
         ]);

         $siswa = Siswa::findOrFail(\Auth::guard('siswa')->user()->id_siswa);
         $siswa->password = bcrypt($req->sandi);
         $siswa->save();

         return redirect()->route('siswa.ubahkatasandi')->with(['jenis' => 'success','pesan' => 'Berhasil merubah kata sandi']);
     }

     public function angsuran(){
        $siswa = \Auth::guard('siswa')->user();

        foreach($siswa->toArray() as $key => $value)
        {
            if (!in_array($key, $this->except)) {
                if($value == null){
                    return redirect()->route('siswa.predaftar')->with(['jenis' => 'danger','pesan' => 'Anda harus melengkapi data diri terlebih']);
                    die();
                }
            }
        }

        $angsuran = DB::table('cicil')
        ->select('siswa.*','kategori_cicil.*','cicil.*')
        ->join('siswa', 'siswa.id_siswa','=','cicil.siswa_id')
        ->join('kategori_cicil', 'kategori_cicil.id_kategori_cicil','=','cicil.kategori_cicil_id')
        ->where('siswa.id_siswa', $siswa->id_siswa)
        ->orderBy('created_at', 'desc')
        ->get();

        $nama_kategori = [];
        $nilai_kategori = [];

        for($i = 0; $i < count($angsuran); $i++){
            if(!in_array($angsuran[$i]->nama_cicil, $nama_kategori)){
                array_push($nama_kategori,$angsuran[$i]->nama_cicil);
                array_push($nilai_kategori,$angsuran[$i]->nilai_cicil);
            }else{
                $index = array_search($angsuran[$i]->nama_cicil, array_keys($nama_kategori));
                $nilai_kategori[$index] = $nilai_kategori[$index] + $angsuran[$i]->nilai_cicil;
            }
        }

        return view('siswa.angsuran.index', compact('angsuran', 'nama_kategori', 'nilai_kategori'));
     }


}
