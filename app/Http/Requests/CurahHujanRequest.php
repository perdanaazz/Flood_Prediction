<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurahHujanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tahun'               => 'required|integer',
            'jan'                 => 'required|numeric',
            'feb'                 => 'required|numeric',
            'mar'                 => 'required|numeric',
            'apr'                 => 'required|numeric',
            'mei'                 => 'required|numeric',
            'jun'                 => 'required|numeric',
            'jul'                 => 'required|numeric',
            'ags'                 => 'required|numeric',
            'sep'                 => 'required|numeric',
            'okt'                 => 'required|numeric',
            'nov'                 => 'required|numeric',
            'des'                 => 'required|numeric',
            'nama_provinsi'       => 'required|string|max:255',
            'nama_kota_kabupaten' => 'required|string|max:255',
            'nama_kecamatan'      => 'required|string|max:255',
            'longitude'           => 'required|string',
            'latitude'            => 'required|string',
        ];
    }
}
