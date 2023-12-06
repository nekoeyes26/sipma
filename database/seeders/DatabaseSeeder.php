<?php

namespace Database\Seeders;

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
        $this->call(MahasiswaSeeder::class);
        $this->call(AduanSeeder::class);
        $this->call(BakpkSeeder::class);
        $this->call(PimpinanKampusSeeder::class);
        $this->call(SolusiSeeder::class);
        $this->call(TransaksiAduanSeeder::class);
    }
}
