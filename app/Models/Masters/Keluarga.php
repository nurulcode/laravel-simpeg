<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai');
    }


    public function pendidikan()
    {
        return $this->belongsTo('App\Models\Masters\Pendidikan');
    }

    public function getStatusStringAttribute()
    {
        if ($this->status == 1) {
            return 'Orang Tua';
        } elseif ($this->status == 2) {
            return 'Suami Istri';
        } else {
            return ' Anak';
        }
    }
}
