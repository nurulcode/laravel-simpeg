<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use App\Models\Masters\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikans = DB::table('pendidikans')->get();
        $kategoris = DB::table('pendidikans')->select('kategori')->groupBy('kategori')->get();
        return view('master.pendidikan.index', compact('pendidikans', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori' => 'required',
            'nama' => 'required',
            'tingkat' => 'required',
            'laki' => 'required|numeric',
            'perempuan' => 'required|numeric'
        ]);

        $pendidikan = new Pendidikan();

        $pendidikan->kategori = $request->kategori;
        $pendidikan->nama = $request->nama;
        $pendidikan->tingkat = Str::upper($request->tingkat);
        $pendidikan->laki = $request->laki;
        $pendidikan->perempuan = $request->perempuan;

        $pendidikan->save();
        return redirect()->route('pendidikan.index')->with('success', 'Data has been saved successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan)
    {
        $kategoris = DB::table('pendidikans')->select('kategori')->groupBy('kategori')->get();
        return view('master.pendidikan.edit', compact('pendidikan', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $this->validate($request, [
            'kategori' => 'required',
            'nama' => 'required',
            'tingkat' => 'required',
            'laki' => 'required|numeric',
            'perempuan' => 'required|numeric'
        ]);

        $pendidikan->kategori =  $request->kategori;
        $pendidikan->nama =  $request->nama;
        $pendidikan->tingkat = Str::upper($request->tingkat);
        $pendidikan->laki =  $request->laki;
        $pendidikan->perempuan =  $request->perempuan;
        $pendidikan->save();

        return redirect()->route('pendidikan.index')->with('success', 'Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendidikan)
    {
        $pendidikan->delete();
        return back()->with('success', 'Data has been deleted successfully');
    }
}
