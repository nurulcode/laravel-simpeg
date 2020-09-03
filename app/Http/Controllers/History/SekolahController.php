<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;

use App\Http\Requests\SekolahRequest;
use App\Models\History\Sekolah;
use App\Models\Masters\Pendidikan;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\Rule;

class SekolahController extends Controller
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
            $results = Sekolah::where('pegawai_id', auth()->user()->pegawai_id)->with('pegawai:id,nama_lengkap as nama_pegawai')->get();
        } else {
            $results = Sekolah::with('pegawai:id,nama_lengkap as nama_pegawai')->get();
        }

            if($request->ajax()){
                return datatables()->of($results)
                            ->addColumn('action', function($data){
                                $action  = '<a class="btn btn-primary btn-sm waves-effect waves-light" href="'.route("sekolah.edit", $data->id).'"><i class="fas fa-edit"></i></a>';
                                $action .= '&nbsp;';
                                $action  .= '<a class="btn btn-info btn-sm waves-effect waves-light" href="'.route("sekolah.show", $data->id).'"><i class="fas fa-eye"></i></a>';
                                $action .= '&nbsp;';
                                $action .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
                                return $action;
                            })->addColumn('nti', function($data){
                                $nti =  $data->nomor.', <br> '. Carbon::parse($data->tgl_ijazah)->format('d-m-Y');
                                return $nti;
                            })
                            ->rawColumns(['action', 'nti'])
                            ->addIndexColumn()
                            ->make(true);
            }

        return view('history.sekolah.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pendidikans = Pendidikan::select('id', 'kategori', 'nama')->get();
        $pegawais = Pegawai::select('id', 'nip', 'nama_lengkap')->get();
        return view('history.sekolah.create', compact('pendidikans', 'pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SekolahRequest $request)
    {

        $this->validate($request, [
            'pendidikan_id' => 'required|unique:sekolahs,pendidikan_id',
            'nomor' => 'required|max:100|unique:sekolahs,nomor',
        ]);

        $sekolah = new Sekolah();

        $sekolah->pegawai_id = auth()->user()->role == 'superuser' ? $request->pegawai_id : auth()->user()->pegawai_id;
        $sekolah->tingkat = $request->tingkat;
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->lokasi = $request->lokasi;
        $sekolah->pendidikan_id = $request->pendidikan_id;
        $sekolah->tgl_ijazah = Carbon::createFromFormat('m/d/Y', $request->get('tgl_ijazah'))->format('Y-m-d');
        $sekolah->nomor = $request->nomor;
        $sekolah->rektor = $request->rektor;

        $sekolah->save();
        return redirect()->route('sekolah.index')->with('success', 'Data has been saved successfully.');
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
        $pendidikans = Pendidikan::select('id', 'kategori', 'nama')->get();
        return view('history.sekolah.edit', compact('pendidikans', 'sekolah'));
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

        $this->validate($request, [
            'pendidikan_id' => [
                'required',
                Rule::unique("sekolahs")->ignore($sekolah->pendidikan_id, "pendidikan_id")
            ],
            'nomor' => [
                'required',
                Rule::unique("sekolahs")->ignore($sekolah->nomor, "nomor")
            ]
        ]);

        $sekolah->pegawai_id = auth()->user()->role == 'superuser' ? $request->pegawai_id : auth()->user()->pegawai_id;
        $sekolah->tingkat = $request->tingkat;
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->lokasi = $request->lokasi;
        $sekolah->pendidikan_id = $request->pendidikan_id;
        $sekolah->tgl_ijazah = Carbon::createFromFormat('m/d/Y', $request->get('tgl_ijazah'))->format('Y-m-d');
        $sekolah->nomor = $request->nomor;
        $sekolah->rektor = $request->rektor;

        $sekolah->save();
        return redirect()->route('sekolah.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Sekolah $sekolah)
    {
        $sekolah->delete();

        if($request->ajax()){
            return response()->json($sekolah);

        }
        return back()->with('success', 'Data has been removed');
    }
}
