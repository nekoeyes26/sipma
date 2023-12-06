<?php

namespace Database\Seeders;

use App\Models\Bakpk;
use Illuminate\Database\Seeder;

class BakpkSeeder extends Seeder
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
            Bakpk::create([
                'nip_bakpk' => $faker->randomNumber(9, true),
                'email' => $faker->unique()->safeEmail,
                'nama' => $faker->name,
                'password' => "password",
            ]);
        }
    }
}
