<?php

namespace App\Http\Controllers;

use App\BiayaGelombang;
use App\Gelombang;
use App\Jurusan;
use App\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiayaGelombangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biayagelombang = DB::table('biaya_gelombang')
        ->select('biaya_gelombang.*', 'jurusan.nama_jurusan', 'gelombang.nama_gelombang')
        ->join('jurusan','jurusan.id_jurusan', 'biaya_gelombang.jurusan_id')
        ->join('gelombang','gelombang.id_gelombang', 'biaya_gelombang.gelombang_id')
        ->join('tahun_ajaran','tahun_ajaran.id_tahun_ajaran','=', 'gelombang.tahun_ajaran_id')
        ->where('tahun_ajaran.status', 1)
        ->get();

        return view('admin.biayagelombang.index', compact('biayagelombang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::get();
        $tahunajaran = TahunAjaran::where('status', '1')->first();
        $gelombang = Gelombang::where('tahun_ajaran_id', $tahunajaran->id_tahun_ajaran)->get();
        return view('admin.biayagelombang.create', compact('jurusan', 'gelombang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'biaya' => 'required',
            'rincian_biaya_daftar_ulang' => 'required',
            'jurusan_id_jurusan' => 'required',
            'gelombang_id_gelombang' => 'required',
        ]);

        BiayaGelombang::create([
            'biaya' => $request->biaya,
            'rincian_biaya_daftar_ulang' => $request->rincian_biaya_daftar_ulang,
            'jurusan_id' => $request->jurusan_id_jurusan,
            'gelombang_id' => $request->gelombang_id_gelombang,
        ]);
        return redirect(route('admin.biayagelombang'))->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Biaya Gelombang']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::get();
        $tahunajaran = TahunAjaran::where('status', '1')->first();
        $gelombang = Gelombang::where('tahun_ajaran_id', $tahunajaran->id_tahun_ajaran)->get();
        $biayagelombang = BiayaGelombang::findOrFail($id);
        return view('admin.biayagelombang.edit', compact('jurusan', 'gelombang','biayagelombang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'biaya' => 'required',
            'rincian_biaya_daftar_ulang' => 'required',
            'jurusan_id_jurusan' => 'required',
            'gelombang_id_gelombang' => 'required',
        ]);

        BiayaGelombang::find($id)->update([
            'biaya' => $request->biaya,
            'rincian_biaya_daftar_ulang' => $request->rincian_biaya_daftar_ulang,
            'jurusan_id' => $request->jurusan_id_jurusan,
            'gelombang_id' => $request->gelombang_id_gelombang,
        ]);
        return redirect(route('admin.biayagelombang'))->with(['jenis' => 'success','pesan' => 'Berhasil Mengedit Biaya Gelombang']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biayagelombang = BiayaGelombang::findOrFail($id);
        $biayagelombang->delete();

        return redirect(route('admin.biayagelombang'))->with(['jenis' => 'success','pesan' => 'Biaya Gelombang Berhasil dihapus']);
    }
}
