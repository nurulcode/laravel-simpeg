<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use App\Models\Masters\Gaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = Gaji::get();

        if($request->ajax()){
            return datatables()->of($results)
                        ->addColumn('action', function($data){
                            $action  = '<a class="btn btn-info btn-sm waves-effect waves-light" href="'.route("gaji.edit", $data->id).'" ><i class="fas fa-edit"></i></a>';
                            $action .= '&nbsp;';
                            $action .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
                            return $action;
                        })->addColumn('nominal', function($data){
                            $nominal ="Rp. " . number_format( $data->nominal, 0, ".", ".");
                            return $nominal;
                        })
                        ->rawColumns(['action', 'nominal'])
                        ->addIndexColumn()
                        ->make(true);
        }

        return view('master.gaji.index', compact('results'));
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
            'nominal' => 'required|numeric|digits_between:6,7'
        ]);

        $jabatan = new Gaji();
        $jabatan->nominal = $request->nominal;

        $jabatan->save();
        return back()->with('success', 'Data has been saved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit(Gaji $gaji)
    {
        return view('master.gaji.edit', compact('gaji'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gaji $gaji)
    {
        $this->validate($request, [
            'nominal' => 'required|numeric|digits_between:6,7'
        ]);

        $gaji->nominal = $request->nominal;

        $gaji->save();
        return redirect()->route('gaji.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gaji $gaji)
    {
        $gaji->delete();
        return response()->json($gaji);
        // return back()->with('success', 'Data has been deleted successfully');
    }
}
