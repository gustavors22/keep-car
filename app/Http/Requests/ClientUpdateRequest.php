<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
}
