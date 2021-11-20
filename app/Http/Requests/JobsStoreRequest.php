<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobsStoreRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'title' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'numeric', 'min:0'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date'],
            'status' => ['required', 'string', 'max:255'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'vehicle_id' => ['required', 'numeric', 'exists:vehicles,id'],
            'client_id' => ['required', 'numeric', 'exists:clients,id'],
        ];
    }
    
    public function attributes()
    {
        return [
            'title' => 'Título',
            'description' => 'Descrição',
            'start_date' => 'Data de início',
            'end_date' => 'Data de término',
            'status' => 'Status',
            'price' => 'Preço',
            'vehicle_id' => 'Veículo',
            'client_id' => 'Cliente',
        ];
    }
}
