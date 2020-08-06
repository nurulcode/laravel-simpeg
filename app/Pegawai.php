<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $guarded = [];

    public function setDateAttribute($value)
    {
        $this->attributes['tanggal_lahir'] = Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function getUrlAttribute()
    {
        return route('pegawais.show', $this->id);
    }
}
