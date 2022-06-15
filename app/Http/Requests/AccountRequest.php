<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'conta' => 'required',
            'tipo' => 'required',
            'data' => 'required',
            'fornecedor' => 'required',
            'cpf_cnpj' => 'required',
            'valor' => 'required|regex:/^(\d{1,3}\.)*?(\d{1,3}),\d{2}$/',

        ];
    }
}
