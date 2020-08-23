<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
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
            'nama_lengkap' => 'required|min:5|max:200',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'pernikahan' => 'required',
            'kepegawaian' => 'required',
            'email' => 'required',
            'unit_id' => 'required',
            'agama' => 'required',
            'telfon' => 'required|digits_between:10,15',
            'alamat' => 'required|max:200',
        ];
    }
}
