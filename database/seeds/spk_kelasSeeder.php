<?php

use Illuminate\Database\Seeder;

class spk_kelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Spk_Kelas::create([
            'nama_kelas'=>'TKJ',
            'users_id'=>'2',
        ]);
        
    }
}
