<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalarieUpdateRequest extends FormRequest
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
            'salcat_id' => 'required',
            'clase_id' => 'required',
            'level_salary'=>'required',
            'denomination'=>'required',
            'nro_item' => 'required',
            'salary_monthly' => 'required',
        ];
    }

    public function messages()
    {
        return [
        'salcat_id.required' => 'El campo categoria es obligatorio',
        'clase_id.required' => 'El campo clase es obligatorio',
        'level_salary.required' => 'El campo nivel salarial es obligatorio',
        'denomination.required' => 'El campo denominacion es obligatorio',
        'nro_item.required' => 'El campo nro de item es obligatorio',
        'salary_monthly.required' => 'El campo salario mensual es obligatorio',

        ];
    }
}
