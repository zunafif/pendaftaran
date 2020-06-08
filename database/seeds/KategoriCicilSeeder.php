<?php

use Illuminate\Database\Seeder;
use App\KategoriCicil;
class KategoriCicilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriCicil::create([
            'nama_cicil' => 'Biaya Sumbangan Pembangunan (DPP)',
        ]);
    }
}
