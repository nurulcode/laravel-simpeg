<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;


class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = Activity::all();
        // $result =  json_encode($result[0]);

        // $result = serialize($result);
        // $result = unserialize($result);
        // $result->description;
        // $result->changes;

        // return $result;
        if($request->ajax()){
            return datatables()->of($result)
            ->editColumn('created_at', function($data){
                $create = Carbon::parse($data->created_at);
                return $create;
            })
            ->editColumn('updated_at', function($data){
                $update = Carbon::parse($data->updated_at);
                return $update;
            })
            ->addColumn('attributes', function($data){
                // $role = '';
                // foreach ($data->properties['attributes'] as $key => $value) {
                //     $role .= ' '.$value.' ';
                // }
                // return $role;

                return $data->changes;
            })
            ->rawColumns(['attributes'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('logs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
