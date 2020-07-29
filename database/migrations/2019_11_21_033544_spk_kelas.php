<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpkKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spk_kelas', function(Blueprint $table){
            $table->increments('id');
            $table->string('nama_kelas');
            $table->integer('users_id')->nullable()->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::dropIfExists('spk_kelas');
    }
}
