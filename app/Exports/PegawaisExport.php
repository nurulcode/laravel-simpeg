<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;


class PegawaisExport implements FromView
{
    use Exportable;

//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Pegawai::all();
//     }

    public function view(): View
        {
            return view('excels.pegawai.pegawais', [
                'results' => Pegawai::all()
            ]);
        }
}
