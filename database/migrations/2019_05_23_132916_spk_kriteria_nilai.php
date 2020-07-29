<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpkKriteriaNilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spk_kriteria_nilai',function(Blueprint $table){
            $table->increments("id_kriteria_nilai");
            $table->integer("kriteria_id_dari");
            $table->integer("kriteria_id_tujuan");
            $table->integer("nilai");
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
        Schema::dropIfExists('spk_kriteria_nilai');
    }
}
