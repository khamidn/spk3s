<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpkSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spk_siswa',function(Blueprint $table){
            $table->increments('id');
            $table->integer('nisn');
            $table->string('nama_siswa');
            $table->integer('kelas_id')->unsigned();
            $table->foreign('kelas_id')->references('id')->on('spk_kelas');
            $table->float('nilai_akhir_ci',4,3)->nullable();
            $table->string('keputusan')->nullable();
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
        Schema::dropIfExists('spk_siswa');
    }
}
