<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SekolahRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pegawai_id' => 'required',
            'tingkat' => 'required|max:100',
            'nama_sekolah' => 'required|max:100',
            'lokasi' => 'required|max:100',
            'pendidikan_id' => 'required',
            'nomor' => 'required|max:100',
            'tgl_ijazah' => 'required',
            'rektor' => 'required|max:100',
        ];
    }
}
