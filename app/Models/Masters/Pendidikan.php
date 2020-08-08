<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $guarded = [];

    public function keluarga()
    {
        return $this->hasOne('App\Models\Master\Keluarga');
    }
}
