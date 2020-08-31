<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{

    function fetch(Request $request)
    {
        if($request->get('query'))
            {
                $query = $request->get('query');
                $results = Pegawai::where('nama_lengkap', 'LIKE', "%{$query}%")->get();
                $output = '<select class="form-control select2" name="pegawai_id">';
                foreach($results as $result)
                    {
                        $output .= '<option value="'.$result->id.'">'.$result->nip. ' - ' .$result->nama_lengkap.'</option>';
                    }
                    $output .= '</select>';
                echo $output;
            }
    }

    function fetchCategories(Request $request)
    {
        if($request->get('query'))
            {
                $query = $request->get('query');
                $results = Pegawai::where('nama_lengkap', 'LIKE', "%{$query}%")->get();
                $output = '<select class="form-control select2" name="pegawai_id">';
                foreach($results as $result)
                    {
                        $output .= '<option value="'.$result->id.'">'.$result->nip. ' - ' .$result->nama_lengkap.'</option>';
                    }
                    $output .= '</select>';
                echo $output;
            }
    }
}
