<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SuratKeluarRequest extends FormRequest
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
        return [
            //
        ];
    }

    public function store()
    {
        return [
            'file_surat' => 'mimes:doc,docx | required',
        ];
    }

    public function messages()
    {
        return [
            'file_surat.mimes' => 'Format File Surat yang dipilih harus .DOC, .DOCX!',
            'file_surat.required' => 'File Surat belum dipilih!'
        ];
    }
}
