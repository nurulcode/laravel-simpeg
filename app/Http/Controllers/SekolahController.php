<?php

namespace App\Http\Controllers;

use App\Http\Requests\SekolahRequest;
use App\Models\Sekolah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolahs = DB::table('sekolahs')
        ->join('pegawais', 'sekolahs.pegawai_id' , '=', 'pegawais.id')
        ->join('pendidikans', 'sekolahs.pendidikan_id' , '=', 'pendidikans.id')
        ->select('sekolahs.*', 'pegawais.nama_lengkap', 'pendidikans.nama as nama_pendidikan')
        ->get();
        // return response()->json($sekolahs);

        return view('sekolahs.index', compact('sekolahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pendidikans = DB::table('pendidikans')->select('id', 'kategori', 'nama')->get();
        $pegawais = DB::table('pegawais')->select('id', 'nip', 'nama_lengkap')->get();
        return view('sekolahs.create', compact('pendidikans', 'pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SekolahRequest $request)
    {
        $sekolah = new Sekolah();

        $sekolah->pegawai_id = $request->pegawai_id;
        $sekolah->tingkat = $request->tingkat;
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->lokasi = $request->lokasi;
        $sekolah->pendidikan_id = $request->pendidikan_id;
        $sekolah->tgl_ijazah = Carbon::createFromFormat('m/d/Y', $request->get('tgl_ijazah'))->format('Y-m-d');
        $sekolah->nomor = $request->nomor;
        $sekolah->rektor = $request->rektor;

        $sekolah->save();
        return redirect()->route('sekolahs.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $sekolah)
    {
        $pendidikans = DB::table('pendidikans')->select('id', 'kategori', 'nama')->get();
        $pegawais = DB::table('pegawais')->select('id', 'nip', 'nama_lengkap')->get();
        return view('sekolahs.edit', compact('pendidikans', 'pegawais', 'sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(SekolahRequest $request, Sekolah $sekolah)
    {


        $sekolah->pegawai_id = $request->pegawai_id;
        $sekolah->tingkat = $request->tingkat;
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->lokasi = $request->lokasi;
        $sekolah->pendidikan_id = $request->pendidikan_id;
        $sekolah->tgl_ijazah = Carbon::createFromFormat('m/d/Y', $request->get('tgl_ijazah'))->format('Y-m-d');
        $sekolah->nomor = $request->nomor;
        $sekolah->rektor = $request->rektor;

        $sekolah->save();
        return redirect()->route('sekolahs.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();
        return back()->with('success', 'Data has been removed');
    }
}
