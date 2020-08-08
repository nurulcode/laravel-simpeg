<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function pegawai()
    {
        return $this->hasOne('App\Models\Pegawai');
    }
}
