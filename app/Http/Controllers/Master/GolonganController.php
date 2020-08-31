<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use App\Models\Masters\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = Golongan::get();

        if($request->ajax()){
            return datatables()->of($results)
                        ->addColumn('action', function($data){
                            $action  = '<a class="btn btn-info btn-sm waves-effect waves-light" href="'.route("golongan.edit", $data->id).'" ><i class="fas fa-edit"></i></a>';
                            $action .= '&nbsp;';
                            $action .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
                            return $action;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }

        return view('master.golongan.index');
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
            'pangkat' => 'required|max:30',
            'golongan' => 'required|max:2',
            'ruang' => 'required|max:2'
        ]);

        $golongan = new Golongan();

        $golongan->pangkat = $request->pangkat;
        $golongan->golongan = $request->golongan;
        $golongan->ruang = $request->ruang;

        $golongan->save();
        return redirect()->route('golongan.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Golongan $golongan)
    {
        return view('master.golongan.edit', compact('golongan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Golongan $golongan)
    {
        $this->validate($request, [
            'pangkat' => 'required|max:30',
            'golongan' => 'required|max:2',
            'ruang' => 'required|max:2'
        ]);

        $golongan->pangkat = $request->pangkat;
        $golongan->golongan = $request->golongan;
        $golongan->ruang = $request->ruang;

        $golongan->save();
        return redirect()->route('golongan.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Golongan $golongan)
    {
        $golongan->delete();
        return response()->json($golongan);
        // return back()->with('success', 'Data has been deleted successfully.');
    }
}
