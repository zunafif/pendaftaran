<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'siswa';

    /**
     * Run the migrations.
     * @table siswa
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_siswa');
            $table->string('nisn')->unique();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('jenis_kelamin', 255)->nullable();
            $table->string('agama', 255)->nullable();
            $table->string('anak_ke', 255)->nullable();
            $table->string('asal_smp', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('nama_ayah', 255)->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->string('kewarganegaraan_ayah')->nullable();
            $table->string('agama_ayah', 255)->nullable();
            $table->string('alamat_ayah', 255)->nullable();
            $table->string('nomor_telp_ayah', 255)->nullable();
            $table->string('pendidikan_ayah', 255)->nullable()->comment('0 - Tidak Sekolah | 1 - Putus SD | 2 - SD Sederajat | 3 - SMP Sederajat | 4 - SMA Sederajat | 5 - D1 | 6 - D2 | 7 -D3 | 8 - D4/S1 | 9 - S2 | 10 - S3');
            $table->string('pekerjaan_ayah', 255)->nullable()->comment('0 - Tidak Bekerja | 1 - Nelayan | 2 - Petani | 3 - Peternak | 4 - PNS/TNI/Polri | 5 - Karyawan Swasta | 6 - Pedagang Kecil | 7 -Pedagang Besar | 8 - Wiraswasta | 9 - Wirausaha | 10 - Buruh | 11 - Pensiunan | 12 - Meninggal Dunia | 13 - Lain Lain');
            $table->string('nama_ibu', 255)->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->string('kewarganegaraan_ibu')->nullable();
            $table->string('agama_ibu', 255)->nullable();
            $table->string('alamat_ibu', 255)->nullable();
            $table->string('nomor_telp_ibu', 255)->nullable();
            $table->string('pendidikan_ibu', 255)->nullable()->comment('0 - Tidak Sekolah | 1 - Putus SD | 2 - SD Sederajat | 3 - SMP Sederajat | 4 - SMA Sederajat | 5 - D1 | 6 - D2 | 7 -D3 | 8 - D4/S1 | 9 - S2 | 10 - S3');
            $table->string('pekerjaan_ibu', 255)->nullable()->comment('0 - Tidak Bekerja | 1 - Nelayan | 2 - Petani | 3 - Peternak | 4 - PNS/TNI/Polri | 5 - Karyawan Swasta | 6 - Pedagang Kecil | 7 -Pedagang Besar | 8 - Wiraswasta | 9 - Wirausaha | 10 - Buruh | 11 - Pensiunan | 12 - Meninggal Dunia | 13 - Lain Lain');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
