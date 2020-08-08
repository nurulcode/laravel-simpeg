<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KeluargasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 10; $i++){

            DB::table('keluargas')->insert([
                'nik' =>  $faker->ean13,
                'nama_lengkap' => $faker->name,
                'tempat_lahir' => $faker->state,
                'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),

                'jenis_kelamin' => 'L',
                'pekerjaan' => 'ASN',
                'hubungan' => 'Hubungan',
                'pendidikan_id' => rand(1, 100),
                'pegawai_id' => rand(1, 2),
                'status' => rand(1, 3)
            ]);

        }
    }
}
