<?php

namespace App\Models\Masters;
use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
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
}
