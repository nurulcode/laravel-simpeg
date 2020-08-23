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
        return $this->hasMany('App\Models\Keluarga');
    }

    public function sekolahs()
    {
        return $this->hasMany('App\Models\Sekolah');
    }

    public function bahasas()
    {
        return $this->hasMany('App\Models\Sekolah');
    }

    public function tegurans()
    {
        return $this->hasMany('App\Models\Kepegawaian\Teguran');
    }

    public function arsips()
    {
        return $this->hasMany('App\Models\Kepegawaian\KepArsip');
    }


    // public function setTanggalLahirAttribute($value)
    // {
    //     $this->attributes['tanggal_lahir'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    // }


    public function getTodayAttribute($value)
    {
        Carbon::setLocale('id');
        return Carbon::parse($value)->format('d F Y');
    }


    public function date($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function getLahirAttribute()
    {
        return $this->date($this->tanggal_lahir);
    }

    public function getGajiAttribute()
    {
        return $this->date($this->tgl_naik_lahir);
    }

    public function getPangkatAttribute()
    {
        return $this->date($this->tgl_naik_pangkat);
    }



}
