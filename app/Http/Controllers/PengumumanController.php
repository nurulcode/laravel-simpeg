<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result =  DB::table('pengumumans')->get();

        if($request->ajax() ){
            return datatables()->of($result)
                        ->addColumn('action', function($data){
                            $action = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
                            return $action;
                        })->addColumn('exp', function($data){
                            $create = ''.Carbon::parse($data->created_at)->format('m/d/Y').'';
                            return $create;
                        })
                        ->addColumn('pesan', function($data){
                            $pesan = Str::limit(strip_tags($data->pesan), 100);
                            return $pesan;
                        })
                        ->rawColumns(['action', 'exp', 'pesan'])
                        ->addIndexColumn()
                        ->make(true);
        }

        return view('pengumuman.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengumuman.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user_id = auth()->user()->id;

        $this->validate($request, [
            'pesan' => 'required',
            'exp' => 'required',
        ]);

        $exp = Carbon::createFromFormat('m/d/Y', $request->exp)->format('Y-m-d');


        DB::insert('insert into pengumumans (pesan, exp, user_id) values (?, ?, ?)', [$request->pesan, $exp, $request->user_id]);
        return redirect()->route('pengumuman.index')->with('success', 'Data has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $delete = DB::delete('delete from pengumumans where id = ?', [$id]);
            return response()->json($delete);
        }
        return back()->with('success', 'Data has been deleted successfully');
    }
}
