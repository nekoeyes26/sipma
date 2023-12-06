<?php

namespace Database\Seeders;

use App\Models\Aduan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AduanSeeder extends Seeder
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
            Aduan::create([
                'id_mahasiswa' => rand(1, 9),
                'judul_aduan' => $faker->sentence(4),
                'detail_aduan' => $faker->sentence(10),
                'jenis_aduan' => "Akademik",
                'level_aduan' => null,
                'berkas' => null,
                'tanggal_kirim' => Carbon::now(),
            ]);
        }
    }
}
