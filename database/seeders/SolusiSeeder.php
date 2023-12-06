<?php

namespace Database\Seeders;

use App\Models\Solusi;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SolusiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 10; $i++){
            Solusi::create([
                'id_pimpinan' => rand(1, 9),
                'solusi' => $faker->sentences(3, true),
                'tanggal_solusi' => Carbon::now(),
            ]);
        }
    }
}
