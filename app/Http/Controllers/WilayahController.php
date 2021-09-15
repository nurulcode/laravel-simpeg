<?php

namespace App\Http\Controllers;

use App\Provinsi;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Support\Facades\DB;
use Response;

class WilayahController extends Controller
{

    public function getProvinsi()
    {
        $data = Provinsi::get();
        return response()->json($data);
    }
    public function getKabupaten($id)
    {
        $data = Kabupaten::where('provinsi_id', $id)->get();
        return response()->json($data);
    }

    public function getKecamatan($id)
    {
        $data = Kecamatan::where('kabupaten_id', $id)->get();
        return response()->json($data);    }

    public function getKelurahan($id)
    {
        $data = Kelurahan::where('kecamatan_id', $id)->get();
        return response()->json($data);
    }
}
