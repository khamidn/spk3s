<?php

use Illuminate\Database\Seeder;

class spk_kriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Spk_Kriteria::create([
            'id_kriteria'=>'6',
            'nama_kriteria'=>'Rata - Rata Semester Ganjil',
            'bobot_kriteria'=>'2.09',
        ]);
        \App\Spk_Kriteria::create([
            'id_kriteria'=>'7',
            'nama_kriteria'=>'Rata - Rata Semester Genap',
            'bobot_kriteria'=>'2.09',
        ]);
        \App\Spk_Kriteria::create([
            'id_kriteria'=>'8',
            'nama_kriteria'=>'Kehadiran',//Kehadiran
            'bobot_kriteria'=>'0.97',
        ]);
        \App\Spk_Kriteria::create([
            'id_kriteria'=>'9',
            'nama_kriteria'=>'Praktek',//Praktek
            'bobot_kriteria'=>'0.97',
        ]);
        \App\Spk_Kriteria::create([
            'id_kriteria'=>'10',
            'nama_kriteria'=>'Tugas',//Tugas
            'bobot_kriteria'=>'0.45',
        ]);
        \App\Spk_Kriteria::create([
            'id_kriteria'=>'11',
            'nama_kriteria'=>'Sikap',//Sikap
            'bobot_kriteria'=>'0.45',
        ]);


    }
}
