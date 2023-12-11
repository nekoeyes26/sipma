<?php

namespace Database\Seeders;

use App\Models\PimpinanKampus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PimpinanKampusSeeder extends Seeder
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
            PimpinanKampus::create([
                'nip_pimpinan' => $faker->randomNumber(9, true),
                'email' => $faker->unique()->safeEmail,
                'nama' => $faker->name,
                'password' => Hash::make("password"),
                'bagian' => "Akademik",
            ]);
        }
    }
}
