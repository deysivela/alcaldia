<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChargeStoreRequest extends FormRequest
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
            'level_id' => 'required',
            'charge_employee' => 'required|string',

        ];
    }

    public function messages()
    {
        return [
        'level_id.required' => 'Debe eligir un Nivel',
        'charge_employee.required' => 'El campo cargo es obligatorio',

        ];
    }
}
