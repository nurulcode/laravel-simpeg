<?php

namespace App\Http\Controllers\Kepegawaian;

use App\Http\Controllers\Controller;
use App\Models\Kepegawaian\Teguran;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeguranController extends Controller
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
        return view('kepegawaian.teguran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawais = Pegawai::select('id', 'nip', 'nama_lengkap')->get();
        return view('kepegawaian.teguran.create', compact('pegawais'));
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
            'jenis' => 'required',
            'nomor' => 'required',
            'tgl_surat' => 'required',
            'file_surat' => 'required|file|mimes:pdf|max:1024',

        ]);

        $teguran = new Teguran();
        $id = $request->pegawai_id;

        $teguran->pegawai_id = $id;
        $teguran->jenis = $request->jenis;
        $teguran->nomor = $request->nomor;
        $teguran->tgl_surat = Carbon::createFromFormat('m/d/Y', $request->tgl_surat)->format('Y-m-d');

        $file = $request->file('file_surat');
        if ( $file ) {
            $filename =  $id. '-' . time() . '.' . $file->getClientOriginalExtension();
            $file = $request->file('file_surat')->storeAs('tegurans' , $filename,  'public');
            $teguran->file_surat = $file;
        }

        $teguran->save();
        return redirect()->route('teguran.index')->with('status', 'Data has been saved successfully.');
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kepegawaian\Teguran  $teguran
     * @return \Illuminate\Http\Response
     */
    public function show($teguran)
    {
        $tegurans =  Teguran::where('pegawai_id', $teguran)->get();
        return view('kepegawaian.teguran.show', compact('tegurans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kepegawaian\Teguran  $teguran
     * @return \Illuminate\Http\Response
     */
    public function edit(Teguran $teguran)
    {
        $pegawais = Pegawai::select('id', 'nip', 'nama_lengkap')->get();
        return view('kepegawaian.teguran.edit', compact('teguran','pegawais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kepegawaian\Teguran  $teguran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teguran $teguran)
    {
        $this->validate($request, [
            'pegawai_id' => 'required',
            'jenis' => 'required',
            'nomor' => 'required',
            'tgl_surat' => 'required'
        ]);

        $id = $request->pegawai_id;

        $teguran->pegawai_id = $id;
        $teguran->jenis = $request->jenis;
        $teguran->nomor = $request->nomor;
        $teguran->tgl_surat = Carbon::createFromFormat('m/d/Y', $request->tgl_surat)->format('Y-m-d');

        $file = $request->file('file_arsip');
        if ( $file ) {

            if ( $file && file_exists(storage_path('app/public/' . $teguran->file_surat ))) {
                Storage::delete('public/'. $teguran->file_surat);
            }

            $filename =  $id. '-' . time() . '.' . $file->getClientOriginalExtension();
            $file = $request->file('file_surat')->storeAs('tegurans' , $filename,  'public');
            $teguran->file_surat = $file;
        }

        $teguran->save();
        return redirect()->route('teguran.create')->with('status', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kepegawaian\Teguran  $teguran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teguran $teguran)
    {
        $teguran->delete();
        return back()->with('status', 'Data has been deleted successfully.');
    }
}
