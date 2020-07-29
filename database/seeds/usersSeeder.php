<?php

use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'id'=>'1',
            'username'=>'admin',
            'password'=>'$2y$12$xTf.j9HsPuBF/EpyWktNq.O56ilXo.8FXUp.8UAfSuFiw/1ddQK3m',
            'password_unscript'=>'123456',
            'roles'=>'admin',
        ]);

        \App\User::create([
            'id'=>'2',
            'username'=>'wali_kelas_1',
            'password'=>'$2y$12$xTf.j9HsPuBF/EpyWktNq.O56ilXo.8FXUp.8UAfSuFiw/1ddQK3m',
            'password_unscript'=>'123456',
            'roles'=>'wali_kelas',
        ]);

        \App\User::create([
            'id'=>'3',
            'username'=>'wali_kelas_2',
            'password'=>'$2y$12$xTf.j9HsPuBF/EpyWktNq.O56ilXo.8FXUp.8UAfSuFiw/1ddQK3m',
            'password_unscript'=>'123456',
            'roles'=>'wali_kelas',
        ]);

        \App\User::create([
            'id'=>'4',
            'username'=>'wali_kelas_3',
            'password'=>'$2y$12$xTf.j9HsPuBF/EpyWktNq.O56ilXo.8FXUp.8UAfSuFiw/1ddQK3m',
            'password_unscript'=>'123456',
            'roles'=>'wali_kelas',
        ]);

        \App\User::create([
            'id'=>'5',
            'username'=>'wali_kelas_4',
            'password'=>'$2y$12$xTf.j9HsPuBF/EpyWktNq.O56ilXo.8FXUp.8UAfSuFiw/1ddQK3m',
            'password_unscript'=>'123456',
            'roles'=>'wali_kelas',
        ]);
    }
}
