<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PieceUpdateRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'duration' => ['required', 'numeric', 'min:0'],
            'vehicle_id' => ['required', 'numeric', 'exists:vehicles,id'],
        ];
    }
    
    public function attributes()
    {
        return [
            'name' => 'nome',
            'duration' => 'tempo de duração',
            'vehicle_id' => 'veículo',
        ];
    }
}
