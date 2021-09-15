<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $guarded = [];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
