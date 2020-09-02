<?php

namespace App\Http\Controllers;

use App\Http\Requests\PegawaiRequest;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Auth;
use App\Exports\PegawaisExport;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:pegawai-list|pegawai-create|pegawai-edit|pegawai-delete', ['only' => ['index','show']]);
        $this->middleware('permission:pegawai-create', ['only' => ['create','store']]);
        $this->middleware('permission:pegawai-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pegawai-delete', ['only' => ['destroy']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->role !== 'superuser') {
            $pegawais = Pegawai::where('id', auth()->user()->pegawai_id );
        } else {
            $pegawais = Pegawai::all();
        }

        if($request->ajax()){
            return datatables()->of($pegawais)
                        ->addColumn('action', function($data){
                            $action  = '<a class="btn btn-info btn-sm waves-effect waves-light" href="'.route("pegawai.show", $data->id).'" ><i class="fas fa-eye"></i></a>';
                            $action .= '&nbsp;';
                            $action .= '<a class="btn btn-primary btn-sm waves-effect waves-light" href="'.route("pegawai.edit", $data->id).'"><i class="fas fa-edit"></i></a>';
                            $action .= '&nbsp;';
                            $action .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
                            return $action;
                        })->addColumn('foto', function($data){
                            $url_foto = asset("storage/".$data->foto);
                            $foto = '<img src="'.$url_foto.'" class="img-fluid" width="50px">';
                            return $foto;
                        })->addColumn('ttl', function($data){
                            $ttl =  $data->tempat_lahir.', <br> '. Carbon::parse($data->tanggal_lahir)->format('d-m-Y');
                            return $ttl;
                        })
                        ->rawColumns(['action', 'foto', 'ttl'])
                        ->addIndexColumn()
                        ->make(true);
        }

        return view('pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = DB::table('units')->get();
        return view('pegawai.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $request)
    {
        // return $request;

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

        if ($request->tgl_naik_pangkat) {
            $pegawai->tgl_naik_pangkat = Carbon::createFromFormat('m/d/Y', $request->tgl_naik_pangkat)->format('Y-m-d');
        }

        if ($request->tgl_naik_gaji) {
            $pegawai->tgl_naik_gaji = Carbon::createFromFormat('m/d/Y', $request->tgl_naik_gaji)->format('Y-m-d');
        }

        $pegawai->telfon = $request->get('telfon') ;
        $pegawai->email = $request->get('email') ;
        $pegawai->alamat = $request->get('alamat');

        $pegawai->unit_id = $request->get('unit_id');

        if ( $request->file('foto') ) {
            $foto = $request->file('foto')->store('fotos', 'public');
            $pegawai->foto = $foto;
        }



        $pegawai->save();
        return redirect()->route('pegawai.create')->with('status', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        // return response()->json($pegawai->tegurans);
        return view('pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        $units = DB::table('units')->get();
        return view('pegawai.edit', compact('pegawai', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $request, Pegawai $pegawai)
    {
        $pegawai->nip = $request->get('nip');
        $pegawai->nama_lengkap = $request->get('nama_lengkap');
        $pegawai->tempat_lahir = $request->get('tempat_lahir');

        $pegawai->tanggal_lahir = Carbon::createFromFormat('m/d/Y', $request->get('tanggal_lahir'))->format('Y-m-d');

        $pegawai->jenis_kelamin = $request->get('jenis_kelamin');
        $pegawai->agama = $request->get('agama');
        $pegawai->golongan_darah = $request->get('golongan_darah');
        $pegawai->pernikahan = $request->get('pernikahan');
        $pegawai->kepegawaian = $request->get('kepegawaian');

        if ($request->tgl_naik_pangkat) {
            $pegawai->tgl_naik_pangkat = Carbon::createFromFormat('m/d/Y', $request->tgl_naik_pangkat)->format('Y-m-d');
        }

        if ($request->tgl_naik_gaji) {
            $pegawai->tgl_naik_gaji = Carbon::createFromFormat('m/d/Y', $request->tgl_naik_gaji)->format('Y-m-d');
        }

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
        return redirect()->route('pegawai.index')->with('status', 'Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return response()->json($pegawai);
        // return back()->with('success', 'Data has been removed');
    }

    public function report_pegawai(Pegawai $pegawai)
    {
        $pdf = PDF::loadview('pegawai.report_pegawai',compact('pegawai'))->setPaper('A4','potrait');
        return $pdf->stream('laporan-pegawai.pdf');
    }

    public function pegawais_excel(Pegawai $pegawai)
    {
		return Excel::download(new PegawaisExport, 'Laporan_pegawai_rsu_manokwari.xlsx');

    }
}
