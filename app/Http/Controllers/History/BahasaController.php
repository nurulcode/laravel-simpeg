<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use App\Http\Requests\BahasaRequest;
use App\Models\History\Bahasa;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BahasaController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = Bahasa::with('pegawai:id,nama_lengkap as nama_pegawai')->get();
        if($request->ajax()){
            return datatables()->of($results)
                        ->addColumn('action', function($data){
                            $action  = '<a class="btn btn-primary btn-sm waves-effect waves-light" href="'.route("bahasa.edit", $data->id).'"><i class="fas fa-edit"></i></a>';
                            $action .= '&nbsp;';
                            $action .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
                            return $action;
                        })
                        ->rawColumns(['action', 'ttl'])
                        ->addIndexColumn()
                        ->make(true);
        }

        return view('bahasa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawais = Pegawai::select('id', 'nip', 'nama_lengkap')->get();
        return view('bahasa.create', compact('pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BahasaRequest $request)
    {
        $bahasa = new Bahasa();

        $bahasa->pegawai_id = $request->pegawai_id;
        $bahasa->jenis_bahasa = $request->jenis_bahasa;
        $bahasa->bahasa = $request->bahasa;
        $bahasa->kemampuan = $request->kemampuan;

        $bahasa->save();
        return redirect()->route('bahasa.index')->with('success', 'Data has been saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahasa $bahasa)
    {
        $pegawais = Pegawai::select('id', 'nip', 'nama_lengkap')->get();
        return view('bahasa.edit', compact('pegawais', 'bahasa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function update(BahasaRequest $request, Bahasa $bahasa)
    {
        $bahasa->pegawai_id = $request->pegawai_id;
        $bahasa->jenis_bahasa = $request->jenis_bahasa;
        $bahasa->bahasa = $request->bahasa;
        $bahasa->kemampuan = $request->kemampuan;

        $bahasa->save();
        return redirect()->route('bahasa.index')->with('success', 'Data has been saved successfully');
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
        return response()->json($bahasa);
        // return back()->with('success', 'Data has been deleted successfully');
    }
}
