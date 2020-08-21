<?php

namespace App\Models\Kepegawaian;

use Illuminate\Database\Eloquent\Model;

class KepTeguran extends Model
{
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
