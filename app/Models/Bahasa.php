<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bahasa extends Model
{
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai');
    }
}
