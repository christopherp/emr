<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesmenkandungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesmen_kandungans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nama_dokumen');
            $table->string('rm_pasien');
            $table->foreign('rm_pasien')->references('nomor_rm')->on('pasiens');
            $table->string('rujukan')->nullable($value = true);
            $table->date('tanggal_datang')->nullable($value = true);  
            $table->time('jam_datang')->nullable($value = true);
            $table->string('pendarahan')->nullable($value = true);
            $table->string('keputihan')->nullable($value = true);
            $table->string('nyeri')->nullable($value = true);
            $table->string('benjolan')->nullable($value = true);
            $table->string('riwayat_haid')->nullable($value = true);
            $table->integer('menars_usia')->nullable($value = true);
            $table->integer('lama_haid')->nullable($value = true);
            $table->string('nyeri_haid')->nullable($value = true);
            $table->string('nyeri_haid_saat')->nullable($value = true);
            $table->string('jumlah_pembalut')->nullable($value = true);
            $table->string('warna_haid')->nullable($value = true);
            $table->string('konsistensi_haid')->nullable($value = true);
            $table->string('gangguan_seksual')->nullable($value = true);
            $table->string('kb_jenis')->nullable($value = true);
            $table->string('kb_lama')->nullable($value = true);
            $table->string('obathormon_pernah')->nullable($value = true);
            $table->string('penyakit_jantung')->nullable($value = true);
            $table->string('penyakit_paru')->nullable($value = true);
            $table->string('penyakit_infeksi')->nullable($value = true);
            $table->string('penyakit_metabolik')->nullable($value = true);
            $table->string('penyakit_operasi')->nullable($value = true);
            $table->string('faktor_lingkungan')->nullable($value = true);
            $table->string('riwayat_pengobatan')->nullable($value = true);
            $table->string('alergi')->nullable($value = true);
            $table->string('kesadaran')->nullable($value = true);
            $table->integer('tensi')->nullable($value = true);
            $table->integer('nadi')->nullable($value = true);
            $table->integer('suhu_tr')->nullable($value = true);
            $table->integer('suhu_ta')->nullable($value = true);
            $table->integer('respiration_rate')->nullable($value = true);            
            $table->string('keadaan')->nullable($value = true);
            $table->string('keadaan_kepala')->nullable($value = true);
            $table->string('keadaan_dada')->nullable($value = true);
            $table->string('keadaan_perut')->nullable($value = true);
            $table->string('ekstremitas')->nullable($value = true);
            $table->string('vt_p')->nullable($value = true);
            $table->string('vt_cu')->nullable($value = true);
            $table->string('vt_ap_ka')->nullable($value = true);
            $table->string('vt_ap_ki')->nullable($value = true);
            $table->string('vt_cd')->nullable($value = true);
            $table->string('inspekulo')->nullable($value = true);
            $table->string('pungsi_douglas')->nullable($value = true);
            $table->string('ct_scan')->nullable($value = true);
            $table->string('ultrasonografi')->nullable($value = true);
            $table->string('laboratorium')->nullable($value = true);
            $table->string('sketsa')->nullable($value = true);
            $table->string('assesmen')->nullable($value = true);
            $table->string('med_1')->nullable($value = true);
            $table->string('med_2')->nullable($value = true);
            $table->string('med_3')->nullable($value = true);
            $table->string('med_4')->nullable($value = true);
            $table->string('med_5')->nullable($value = true);
            $table->string('dokter_pj')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asesmenkandungan');
    }
}
