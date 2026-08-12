<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'employee_id' => 'required|integer',
            'statu' => 'required',
            'user' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required' => 'Debe seleccionar un Funcionario',
            'statu.required' => 'Elige el esdado para el nuevo Funcionario',
            'user.required' => 'Ingrese su Usuario',
            'password.required' => 'El campo Contraseña es obligatorio',
            'password.min' => 'La contraseña debe contener minimo 6 caracteres',
            'password_confirmation.required' => 'El campo confirmacion de contraseña es obligatorio',
            // 'password_confirmation.confirmed' => 'La Confirmacion de contraseña no coincide', 
        ];
    }
}
