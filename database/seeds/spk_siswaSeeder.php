<?php

use Illuminate\Database\Seeder;

class spk_siswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Spk_Siswa::create([
        	'nisn'=>'103060123',
        	'nama_siswa'=>'Adnan Fajar Abdillah',
            'kelas_id'=>'1',
            'keputusan'=>'0',
        ]);
        \App\Spk_Siswa::create([
        	'nisn'=>'103060124',
        	'nama_siswa'=>'Ahmad Asbi Arafi',
            'kelas_id'=>'1',
            'keputusan'=>'0',
        ]);
        \App\Spk_Siswa::create([
        	'nisn'=>'103060125',
        	'nama_siswa'=>'Ahmad Bagus Darmawan',
            'kelas_id'=>'1',
            'keputusan'=>'0',
        ]);
        \App\Spk_Siswa::create([
        	'nisn'=>'103060126',
        	'nama_siswa'=>'Bagus Santosa',
            'kelas_id'=>'1',
            'keputusan'=>'0',
        ]);
        \App\Spk_Siswa::create([
        	'nisn'=>'103060127',
        	'nama_siswa'=>'Putri Angreini',
            'kelas_id'=>'1',
            'keputusan'=>'0',
        ]);

    }
}
