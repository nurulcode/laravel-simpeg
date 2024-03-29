<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $guarded = [];

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class);
    }
}
