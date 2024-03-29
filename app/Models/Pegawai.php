<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Pegawai extends Model
{
    use LogsActivity;
    protected $guarded = [];

    protected static $logAttributes = ['id','nama_lengkap', 'nip'];
    protected static $logAttributesToIgnore = [ 'updated_at', 'created_at'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;
    protected static $logName = 'pegawai';

    public function getDescriptionForEvent(string $eventName): string
    {
        return auth()->user()->username .' '. $eventName ;
    }

        public function user()
    {
        return $this->hasOne('App\User');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Masters\Unit');
    }

    public function pendidikan()
    {
        return $this->belongsTo('App\Models\Masters\Pendidikan');
    }


    public function keluargas()
    {
        return $this->hasMany('App\Models\History\Keluarga');
    }

    public function sekolahs()
    {
        return $this->hasMany('App\Models\History\Sekolah');
    }

    public function bahasas()
    {
        return $this->hasMany('App\Models\History\Bahasa');
    }

    public function tegurans()
    {
        return $this->hasMany('App\Models\Kepegawaian\Teguran');
    }

    public function arsips()
    {
        return $this->hasMany('App\Models\Kepegawaian\Arsip');
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
