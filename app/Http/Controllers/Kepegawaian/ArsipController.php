<?php

namespace App\Http\Controllers\Kepegawaian;

use App\Http\Controllers\Controller;
use App\Models\Kepegawaian\Arsip;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pegawais = Pegawai::with('unit:id,nama')->get();

        if($request->ajax()){
            return datatables()->of($pegawais)
                        ->addColumn('action', function($data){
                            $action  = '<a class="btn btn-info btn-sm waves-effect waves-light text-center" href="'.route("teguran.show", $data->id).'" ><i class="fas fa-eye"></i></a>';
                            return $action;
                        })->addColumn('ttl', function($data){
                            $ttl =  $data->tempat_lahir.', <br> '. Carbon::parse($data->tanggal_lahir)->format('d-m-Y');
                            return $ttl;
                        })
                        ->rawColumns(['action', 'foto', 'ttl'])
                        ->addIndexColumn()
                        ->make(true);
        }

        return view('kepegawaian.arsip.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawais = Pegawai::select('id', 'nip', 'nama_lengkap')->get();
        return view('kepegawaian.arsip.create', compact('pegawais'));
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
            'pegawai_id' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'file_arsip' => 'required'
        ]);

        $arsip = new Arsip();
        $id = $request->pegawai_id;

        $arsip->pegawai_id = $id;
        $arsip->nama = $request->nama;
        $arsip->jenis = $request->jenis;

        $file = $request->file('file_arsip');
        if ( $file ) {
            $filename =  $id. '-' . time() . '.' . $file->getClientOriginalExtension();
            $file = $request->file('file_arsip')->storeAs('arsips' , $filename,  'public');
            $arsip->file_arsip = $file;
        }

        $arsip->save();
        return redirect()->route('arsip.index')->with('success', 'Data has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kepegawaian\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function show($arsip)
    {
        $arsips =  Arsip::where('pegawai_id', $arsip)->get();
        return view('kepegawaian.arsip.show', compact('arsips'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kepegawaian\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function edit(Arsip $arsip)
    {
        $pegawais = Pegawai::select('id', 'nip', 'nama_lengkap')->get();
        return view('kepegawaian.arsip.edit', compact('arsip','pegawais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kepegawaian\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arsip $arsip)
    {
        $this->validate($request, [
            'pegawai_id' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
        ]);

        $id = $request->pegawai_id;

        $arsip->pegawai_id = $id;
        $arsip->nama = $request->nama;
        $arsip->jenis = $request->jenis;

        $file = $request->file('file_arsip');
        if ( $file ) {

            if ( $file && file_exists(storage_path('app/public/' . $arsip->file_arsip ))) {
                Storage::delete('public/'. $arsip->file_arsip);
            }

            $filename =  $id. '-' . time() . '.' . $file->getClientOriginalExtension();
            $file = $request->file('file_arsip')->storeAs('arsips' , $filename,  'public');
            $arsip->file_arsip = $file;
        }

        $arsip->save();
        return redirect()->route('arsip.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kepegawaian\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arsip $arsip)
    {
        $arsip->delete();
        return back()->with('success', 'Data has been deleted successfully');
    }
}
