<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $guarded = [];

    public function unit()
    {
        return $this->belongsTo('App\Models\Masters\Unit');
    }

    public function keluargas()
    {
        return $this->hasMany('App\Models\Masters\Keluarga');
    }


    public function setDateAttribute($value)
    {
        $this->attributes['tanggal_lahir'] = Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

}
