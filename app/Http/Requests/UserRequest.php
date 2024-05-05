<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'password' => 'required',
                'jk'  => 'required',
                'tgl_lahir'  => 'required',
                'nomor_telepon'  => 'required',
                'alamat'  => 'required',
                'role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Anda belum memasukan NAMA!',
            'email.required' => 'Anda belum memasukan EMAIL!',
            'password.required' => 'Anda belum memasukan PASSWORD!',
            'jk.required' => 'Anda belum memasukan NAMA!',
            'tgl_lahir.required' => 'Anda belum memasukan TANGGAL LAHIR!',
            'nomor_telepon.required' => 'Anda belum memasukan NOMOR TELEPON!',
            'alamat.required' => 'Anda belum memasukan ALAMAT!',
            'role.required' => 'Anda belum memasukan ROLE!',
        ];
    }
}
