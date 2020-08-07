<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;


class Jabatan extends Model
{
    use AutoNumberTrait;

    public function getAutoNumberOptions()
    {
        return [
            'kode' => [
                'length' => 5 // The number of digits in an autonumber
            ]
        ];
    }

}
