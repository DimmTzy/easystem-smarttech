<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'no_hp'   => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s]+$/'],
            'subjek'  => ['required', 'string', 'max:150'],
            'pesan'   => ['required', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'   => 'Nama wajib diisi.',
            'email.required'  => 'Email wajib diisi.',
            'email.email'     => 'Format email tidak valid.',
            'no_hp.required'  => 'Nomor HP wajib diisi.',
            'no_hp.regex'     => 'Format nomor HP tidak valid.',
            'subjek.required' => 'Subjek wajib diisi.',
            'pesan.required'  => 'Pesan wajib diisi.',
        ];
    }
}
