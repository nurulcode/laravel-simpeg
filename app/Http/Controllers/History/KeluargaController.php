<?php
namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use App\Http\Requests\KeluargaRequest;
use App\Models\History\Keluarga;
use App\Models\Masters\Pendidikan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Validation\Rule;

class KeluargaController extends Controller
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
            $results = Keluarga::where('pegawai_id', auth()->user()->pegawai_id)->with('pegawai:id,nama_lengkap as nama_pegawai')->get();
        } else {
            $results = Keluarga::with('pegawai:id,nama_lengkap as nama_pegawai')->get();
        }

            if($request->ajax()){
                return datatables()->of($results)
                            ->addColumn('action', function($data){
                                $action  = '<a class="btn btn-primary btn-sm waves-effect waves-light" href="'.route("keluarga.edit", $data->id).'"><i class="fas fa-edit"></i></a>';
                                $action .= '&nbsp;';
                                $action  .= '<a class="btn btn-info btn-sm waves-effect waves-light" href="'.route("keluarga.show", $data->id).'"><i class="fas fa-eye"></i></a>';
                                $action .= '&nbsp;';
                                $action .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
                                return $action;
                            })->addColumn('ttl', function($data){
                                $ttl =  $data->tempat_lahir.', <br> '. Carbon::parse($data->tanggal_lahir)->format('d-m-Y');
                                return $ttl;
                            })
                            ->rawColumns(['action', 'ttl'])
                            ->addIndexColumn()
                            ->make(true);
            }
        return view('history.keluarga.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pendidikans = Pendidikan::select('id', 'kategori', 'nama')->get();
        return view('history.keluarga.create', compact('pendidikans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeluargaRequest $request)
    {
        $this->validate($request, [
            'nik' => 'required|unique:keluargas,nik',
        ]);

        $keluarga = new Keluarga();

        $keluarga->nik = $request->nik;
        $keluarga->nama_lengkap = Str::title($request->nama_lengkap);
        $keluarga->tempat_lahir = $request->tempat_lahir;
        $keluarga->tanggal_lahir = Carbon::createFromFormat('m/d/Y', $request->get('tanggal_lahir'))->format('Y-m-d');

        $keluarga->jenis_kelamin = $request->jenis_kelamin;
        $keluarga->pekerjaan = Str::upper($request->pekerjaan);

        $keluarga->pendidikan_id = $request->pendidikan_id;
        $keluarga->pegawai_id = auth()->user()->role == 'superuser' ? $request->pegawai_id : auth()->user()->pegawai_id;

        $keluarga->status = $request->status;

        // return response()->json($keluarga);
        $keluarga->save();
        return redirect()->route('keluarga.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show(Keluarga $keluarga)
    {
        return view('history.keluarga.show', compact('keluarga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Keluarga $keluarga)
    {
        $pendidikans = Pendidikan::select('id', 'kategori', 'nama')->get();
        return view('history.keluarga.edit', compact('pendidikans', 'keluarga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(KeluargaRequest $request, Keluarga $keluarga)
    {
        $this->validate($request, [
            'nik' => [
                'required',
                Rule::unique('keluargas')->ignore($keluarga->nik, 'nik')
            ]
        ]);

        $keluarga->nik = $request->nik;
        $keluarga->nama_lengkap = Str::title($request->nama_lengkap);
        $keluarga->tempat_lahir = $request->tempat_lahir;
        $keluarga->tanggal_lahir = Carbon::createFromFormat('m/d/Y', $request->get('tanggal_lahir'))->format('Y-m-d');

        $keluarga->jenis_kelamin = $request->jenis_kelamin;
        $keluarga->pekerjaan = Str::upper($request->pekerjaan);

        $keluarga->pendidikan_id = $request->pendidikan_id;
        $keluarga->pegawai_id = auth()->user()->role == 'superuser' ? $request->pegawai_id : auth()->user()->pegawai_id;

        $keluarga->status = $request->status;

        $keluarga->save();
        return redirect()->route('keluarga.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Keluarga $keluarga)
    {
        $keluarga->delete();

        if ($request->ajax()) {
            return response()->json($keluarga);
        }
        return back()->with('success', 'Data has been removed');
    }
}
