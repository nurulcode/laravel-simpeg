<?php

namespace App\Models\History;

use Illuminate\Database\Eloquent\Model;

class Bahasa extends Model
{
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai');
    }
}
