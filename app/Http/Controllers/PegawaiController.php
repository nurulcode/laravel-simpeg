<?php

namespace App\Http\Controllers;

use App\Http\Requests\PegawaiRequest;
use App\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pegawais = DB::table('pegawais')->get();
        // return response()->json($pegawais);
        return view('pegawais.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $request)
    {
        $pegawai = new Pegawai();

        $pegawai->nama_lengkap = $request->get('nama_lengkap');
        $pegawai->tempat_lahir = $request->get('tempat_lahir');
        $pegawai->tanggal_lahir = Carbon::createFromFormat('m/d/Y', $request->get('tanggal_lahir'))->format('Y-m-d');
        $pegawai->jk = $request->get('jk');
        $pegawai->agama = $request->get('agama');
        $pegawai->phone = $request->get('phone') ;
        $pegawai->alamat = $request->get('alamat');

        if ( $request->file('foto') ) {
            $foto = $request->file('foto')->store('fotos', 'public');
            $pegawai->foto = $foto;
        }

        $pegawai->save();
        return redirect()->route('pegawais.create')->with('status', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        return view('pegawais.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawais.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $request, Pegawai $pegawai)
    {

        $pegawai->nama_lengkap = $request->get('nama_lengkap');
        $pegawai->tempat_lahir = $request->get('tempat_lahir');
        $pegawai->tanggal_lahir = Carbon::createFromFormat('m/d/Y', $request->get('tanggal_lahir'))->format('Y-m-d');
        $pegawai->jk = $request->get('jk');
        $pegawai->agama = $request->get('agama');
        $pegawai->phone = $request->get('phone');
        $pegawai->alamat = $request->get('alamat');

        if ( $request->file('foto')) {
            if ( $pegawai->foto && file_exists(storage_path('app/public/' . $pegawai->foto ))) {
                Storage::delete('public/'. $pegawai->foto);
            }
            $foto = $request->file('foto')->store('fotos', 'public');
            $pegawai->foto = $foto;
        }

        $pegawai->save();
        return redirect()->route('pegawais.index')->with('status', 'Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return back()->with('success', 'Data has been removed');
    }
}
