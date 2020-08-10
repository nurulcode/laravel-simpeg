<?php

namespace App\Http\Controllers;

use App\Http\Requests\SekolahRequest;
use App\Models\Bahasa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BahasaController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawais = DB::table('pegawais')->select('id', 'nip', 'nama_lengkap')->get();
        return view('bahasa.create', compact('pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SekolahRequest $request)
    {
        $bahasa = new Bahasa();

        $bahasa->pegawai_id = $request->pegawai_id;
        $bahasa->jenis_bahasa = $request->jenis_bahasa;
        $bahasa->bahasa = $request->bahasa;
        $bahasa->kemampuan = $request->kemampuan;

        $bahasa->save();
        return back()->with('success', 'Data has been saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahasa $bahasa)
    {
        $pegawais = DB::table('pegawais')->select('id', 'nip', 'nama_lengkap')->get();
        return view('bahasa.create', compact('pegawais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function update(SekolahRequest $request, Bahasa $bahasa)
    {
        $bahasa->pegawai_id = $request->pegawai_id;
        $bahasa->jenis_bahasa = $request->jenis_bahasa;
        $bahasa->bahasa = $request->bahasa;
        $bahasa->kemampuan = $request->kemampuan;

        $bahasa->save();
        return back()->with('success', 'Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahasa $bahasa)
    {
        $bahasa->delete();
        return back()->with('success', 'Data has been deleted successfully');
    }
}
