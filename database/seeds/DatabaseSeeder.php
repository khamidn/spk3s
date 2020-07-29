<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seeder SPK
        $this->call(spk_kriteriaSeeder::class);
        $this->call(spk_kriteria_nilaiSeeder::class);
        // $this->call(usersSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(spk_kelasSeeder::class);
        $this->call(spk_siswaSeeder::class);
        $this->call(spk_siswa_nilaiSeeder::class);
    }
}
