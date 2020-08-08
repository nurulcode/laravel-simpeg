<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PendidikansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        DB::table('pendidikans')->insert([
            'kategori' =>  'TENAGA MEDIS',
            'nama' => 'Dokter Umum',
            'laki' => 15,
            'perempuan' => 11,
        ]);
    }
}
