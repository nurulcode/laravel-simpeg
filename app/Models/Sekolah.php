<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai');
    }

    public function pendidikan()
    {
        return $this->belongsTo('App\Models\Masters\Pendidikan');
    }

    public function date($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function getIjazahAttribute()
    {
        return $this->date($this->tgl_ijazah);
    }
}
