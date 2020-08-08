<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PegawaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 2; $i++){

          DB::table('pegawais')->insert([
              'nip' =>  $faker->ean13,
              'nama_lengkap' => $faker->name,
              'tempat_lahir' => $faker->state,
              'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),

              'jenis_kelamin' => 'L',
              'agama' => 'islam',
              'golongan_darah' => 'O',
              'pernikahan' => 'menikah',
              'kepegawaian' => 'PTT',

              'tgl_naik_pangkat' => $faker->date($format = 'Y-m-d', $max = 'now'),
              'tgl_naik_gaji' => $faker->date($format = 'Y-m-d', $max = 'now'),

              'telfon' => $faker->PhoneNumber,
              'email' => $faker->email,
              'unit_id' => rand(1, 3),
              'alamat' => $faker->address
          ]);

      }
    }
}