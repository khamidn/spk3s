<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpkSiswaNilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spk_siswa_nilai',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_kelas')->unsigned();
            $table->foreign('id_kelas')->references('id')->on('spk_kelas')->onUpdate('cascade');
            $table->integer('id_siswa_dari')->unsigned();
            $table->foreign('id_siswa_dari')->references('id')->on('spk_siswa')->onDelete('cascade');
            $table->integer('id_kriteria_tujuan')->unsigned();
            $table->foreign('id_kriteria_tujuan')->references('id_kriteria')->on('spk_kriteria')->onDelete('cascade');
            $table->string('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spk_alternatif_nilai');
    }
}
