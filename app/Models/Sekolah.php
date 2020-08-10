<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
