<?php

use Illuminate\Database\Seeder;
use App\BiayaGelombang;

class BiayaGelombangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BiayaGelombang::create([
            'biaya' => 1450000,
            'rincian_biaya_daftar_ulang' => 'Pembayaran DPP tanpa di Angsur (Lunas)',
            'jurusan_id' => 1,
            'gelombang_id' => 3
        ]);
        BiayaGelombang::create([
            'biaya' => 1450000,
            'rincian_biaya_daftar_ulang' => 'Pembayaran DPP tanpa di Angsur (Lunas)',
            'jurusan_id' => 2,
            'gelombang_id' => 3
        ]);
        BiayaGelombang::create([
            'biaya' => 1450000,
            'rincian_biaya_daftar_ulang' => 'Pembayaran DPP tanpa di Angsur (Lunas)',
            'jurusan_id' => 3,
            'gelombang_id' => 3
        ]);
    }
}
