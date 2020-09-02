<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use App\Http\Requests\BahasaRequest;
use App\Models\History\Bahasa;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\Rule;

class BahasaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:history-list|history-create|history-edit|history-delete', ['only' => ['index','show']]);
        $this->middleware('permission:history-create', ['only' => ['create','store']]);
        $this->middleware('permission:history-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:history-delete', ['only' => ['destroy']]);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->role != 'superuser') {
            $results = Bahasa::where('pegawai_id', auth()->user()->pegawai_id)->with('pegawai:id,nama_lengkap as nama_pegawai')->get();
        } else {
            $results = Bahasa::with('pegawai:id,nama_lengkap as nama_pegawai')->get();
        }

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

        return view('history.bahasa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawais = Pegawai::select('id', 'nip', 'nama_lengkap')->get();
        return view('history.bahasa.create', compact('pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BahasaRequest $request)
    {
        $id = auth()->user()->role == 'superuser' ? $request->pegawai_id : auth()->user()->pegawai_id;

        $this->validate($request, [
            'bahasa' => 'required|unique:bahasas,bahasa,NULL,id,pegawai_id,'.$id
        ]);

        $bahasa = new Bahasa();

        $bahasa->pegawai_id = $id;
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
        return view('history.bahasa.edit', compact('bahasa'));
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
        $id = auth()->user()->role == 'superuser' ? $request->pegawai_id : auth()->user()->pegawai_id;

        $this->validate($request, [
            'bahasa' => [
                'required',
                Rule::unique('bahasas')->ignore($bahasa->bahasa, 'bahasa')
            ]
        ]);

        $bahasa->pegawai_id = $id;
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
    public function destroy(Request $request,Bahasa $bahasa)
    {
        $bahasa->delete();

        if ($request->ajax()) {
            return response()->json($bahasa);
        }
        return back()->with('success', 'Data has been deleted successfully');
    }
}
