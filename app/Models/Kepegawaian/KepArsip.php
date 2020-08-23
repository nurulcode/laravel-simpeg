<?php

namespace App\Models\Kepegawaian;

use Illuminate\Database\Eloquent\Model;

class KepArsip extends Model
{
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai');
    }
}
