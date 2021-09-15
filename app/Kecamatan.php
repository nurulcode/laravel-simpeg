<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $guarded = [];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }
}
