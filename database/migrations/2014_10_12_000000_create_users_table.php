<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('password_unscript');
            // $table->string('roles');
            $table->rememberToken();
            $table->timestamps();
            // $table->integer('sekolah_id');
            // $table->string('nisn')->nullable();
            // $table->string('nipd')->nullable();
            // $table->string('nuptk')->nullable();
            // $table->string('ip_address')->nullable();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->string('salt')->nullable();
            // $table->string('activation_code')->nullable();
            // $table->string('forgotten_password_code')->nullable();
            // $table->string('forgotten_password_time')->nullable();
            // $table->string('remeber_code')->nullable();
            // $table->rememberToken();
            // $table->timestamps();
            // $table->integer('last_login')->nullable();
            // $table->tinyInteger('active');
            // $table->string('phone')->nullable();
            // $table->string('photo')->nullable();
            // $table->integer('id_petugas')->nullable();
            // $table->integer('siswa_id')->nullable();
            // $table->integer('guru_id')->nullable();
            // $table->integer('login_status')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
