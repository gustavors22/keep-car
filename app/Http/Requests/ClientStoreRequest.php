<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:190'],
            'email' => ['nullable', 'string', 'max:190'],
            'phone' => ['required', 'string', 'max:190'],
            'cpf' => ['required', 'string', 'max:190'],
            'address' => ['required', 'string', 'max:190'],
            'neighborhood' => ['required', 'string', 'max:190'],
            'address_number' => ['required', 'string', 'max:190'],
            'city' => ['required', 'string', 'max:190'],
            'state' => ['required', 'string', 'max:190'],
            'country' => ['required', 'string', 'max:190'],
            'complement' => ['nullable', 'string', 'max:190'],
            'marital_status' => ['nullable', 'string', 'max:190'],
            'profession' => ['nullable', 'string', 'max:190'],
        ];
    }

    //translate fields
    public function attributes()
    {
        return [
            'name' => 'Nome',
            'email' => 'E-mail',
            'phone' => 'Telefone',
            'cpf' => 'CPF',
            'address' => 'Endereço',
            'neighborhood' => 'Bairro',
            'address_number' => 'Número',
            'city' => 'Cidade',
            'state' => 'Estado',
            'country' => 'País',
            'complement' => 'Complemento',
            'marital_status' => 'Estado Civil',
            'profession' => 'Profissão',
        ];
    }
}