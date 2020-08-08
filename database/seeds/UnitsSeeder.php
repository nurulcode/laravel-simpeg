<?php

use App\Models\Masters\Unit;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit1 = new Unit();
        $unit1->kode = 'UK001';
        $unit1->nama = 'UGD';
        $unit1->save();

        $unit2 = new Unit();
        $unit2->kode = 'UK002';
        $unit2->nama = 'RPD';
        $unit2->save();

        $unit3 = new Unit();
        $unit3->kode = 'UK002';
        $unit3->nama = 'Laboratorium';
        $unit3->save();

    }
}
