<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Kelas;
use App\Models\Spp;

class StoreSiswaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $kelasId = Kelas::pluck('id')->toArray();
        $sppId = Spp::pluck('id')->toArray();
        return [
            'nisn' => ['required', 'max:15', 'unique:siswas,nisn'],
            'nis' => ['required', 'max:15', 'unique:siswas,nis'],
            'nama' => ['required', 'string','max:255'],
            'id_kelas' => ['required', Rule::in($kelasId)],
            'alamat' => ['required', 'string','max:255'],
            'no_telp' => ['required', 'max:15'],
            'id_spp' => ['required', Rule::in($sppId)]
        ];
    }
}
