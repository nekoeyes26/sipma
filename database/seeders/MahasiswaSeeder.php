<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
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
            Mahasiswa::create([
                'nim' => rand(1, 4) . "." . rand(10, 99) . "." . rand(10, 99) . "." . rand(1, 9) . "." . rand(1, 35),
                'nama' => $faker->name,
                'password' => Hash::make("password"),
                'jurusan' => "AB",
                'prodi' => "C",
                'tahun_masuk' => "2021",
                'status_mahasiswa' => "Aktif"
            ]);
        }
    }
}
