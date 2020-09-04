<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pegawais = Pegawai::count();
        $pns = Pegawai::where('kepegawaian', 'ASN')->count();
        $honor = Pegawai::where('kepegawaian', 'PTT')->count();
        $pengumumans =  DB::select('select * from pengumumans');
        return view('home', compact('pengumumans', 'pegawais', 'pns', 'honor') );
    }
}
