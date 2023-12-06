<?php

namespace Database\Seeders;

use App\Models\TransaksiAduan;
use Illuminate\Database\Seeder;

class TransaksiAduanSeeder extends Seeder
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
            TransaksiAduan::create([
                'id_aduan' => rand(1, 9),
                'id_solusi' => null,
                'id_bakpk' => rand(1, 9),
                'tindak_lanjut' => $faker->sentence(6, true),
            ]);
        }
    }
}
