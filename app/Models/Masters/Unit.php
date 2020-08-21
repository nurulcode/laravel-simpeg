<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;


class Unit extends Model
{
    use AutoNumberTrait;

    protected $guarded = [];

    public function getAutoNumberOptions()
    {
        return [
            'kode' => [
                'length' => 3 // The number of digits in an autonumber
            ]
        ];
    }

    public function pegawai()
    {
        return $this->hasOne('App\Models\Pegawai');
    }
}
