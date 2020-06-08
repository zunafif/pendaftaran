<?php

use Illuminate\Database\Seeder;
use App\Dokumen;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dokumen::create([
            'nama_dokumen' => 'Ijazah',
            'status' => 1
        ]);

        Dokumen::create([
            'nama_dokumen' => 'SKHUN',
            'status' => 1
        ]);

        Dokumen::create([
            'nama_dokumen' => 'Surat Keterangan DPP',
            'status' => 1
        ]);

        Dokumen::create([
            'nama_dokumen' => 'Raport Kelas 9',
            'status' => 1
        ]);
    }
}
