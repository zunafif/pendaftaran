<?php

use Illuminate\Database\Seeder;
use App\Gelombang;
use Carbon\Carbon;

class GelombangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gelombang::create([
            'nama_gelombang' => 'Jalur Khusus',
            'mulai' => Carbon::parse('2019/02/01'),
            'selesai' => Carbon::parse('2020/02/28'),
            'kuota' => 999,
            'status' => 0,
            'tahun_ajaran_id' => 1
        ]);
        Gelombang::create([
            'nama_gelombang' => 'Gelombang 1',
            'mulai' => Carbon::parse('2020/03/19'),
            'selesai' => Carbon::parse('2020/04/29'),
            'kuota' => 999,
            'status' => 0,
            'tahun_ajaran_id' => 1
        ]);
        Gelombang::create([
            'nama_gelombang' => 'Gelombang 2',
            'mulai' => Carbon::parse('2020/05/01'),
            'selesai' => Carbon::parse('2020/07/10'),
            'kuota' => 999,
            'status' => 1,
            'tahun_ajaran_id' => 1
        ]);
    }
}
