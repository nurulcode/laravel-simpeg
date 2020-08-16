<?php

namespace App\Http\Controllers;

use App\Http\Requests\PegawaiRequest;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pegawais = Pegawai::all();
        return view('pegawais.index', compact('pegawais'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report_pegawais(Pegawai $pegawai)
    {
    	$pdf = PDF::loadview('pegawais.report_pegawais',compact('pegawai'))->setPaper('A4','potrait');
        return $pdf->stream('laporan-pegawai.pdf');

        // return view('pegawais.report_pegawais', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = DB::table('units')->get();
        return view('pegawais.create', compact('units'));
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

        $pegawai->nip = $request->get('nip');
        $pegawai->nama_lengkap = $request->get('nama_lengkap');
        $pegawai->tempat_lahir = $request->get('tempat_lahir');
        $pegawai->tanggal_lahir = Carbon::createFromFormat('m/d/Y', $request->get('tanggal_lahir'))->format('Y-m-d');

        $pegawai->jenis_kelamin = $request->get('jenis_kelamin');
        $pegawai->agama = $request->get('agama');
        $pegawai->golongan_darah = $request->get('golongan_darah');
        $pegawai->pernikahan = $request->get('pernikahan');
        $pegawai->kepegawaian = $request->get('kepegawaian');

        $pegawai->tgl_naik_pangkat = Carbon::createFromFormat('m/d/Y', $request->get('tgl_naik_pangkat'))->format('Y-m-d');
        $pegawai->tgl_naik_gaji = Carbon::createFromFormat('m/d/Y', $request->get('tgl_naik_gaji'))->format('Y-m-d');

        $pegawai->telfon = $request->get('telfon') ;
        $pegawai->email = $request->get('email') ;
        $pegawai->alamat = $request->get('alamat');

        $pegawai->unit_id = $request->get('unit_id');

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
        $units = DB::table('units')->get();
        return view('pegawais.edit', compact('pegawai', 'units'));
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

        $pegawai->jenis_kelamin = $request->get('jenis_kelamin');
        $pegawai->agama = $request->get('agama');
        $pegawai->golongan_darah = $request->get('golongan_darah');
        $pegawai->pernikahan = $request->get('pernikahan');
        $pegawai->kepegawaian = $request->get('kepegawaian');

        $pegawai->tgl_naik_pangkat = Carbon::createFromFormat('m/d/Y', $request->get('tgl_naik_pangkat'))->format('Y-m-d');
        $pegawai->tgl_naik_gaji = Carbon::createFromFormat('m/d/Y', $request->get('tgl_naik_pangkat'))->format('Y-m-d');

        $pegawai->telfon = $request->get('telfon') ;
        $pegawai->email = $request->get('email') ;
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
