<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
    
    public function rules()
    {
        return [
            'level_id' => 'required',
            'charge_id' =>'required',
            // 'salarie_id' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'phone' => 'required|integer|unique:employees,phone,' . $this->employee->id,
            'email' => 'required|unique:employees,email,'. $this->employee->id,
            'photo' => 'max:1024|mimes:png,jpg,jpeg',
            'type_employee' => 'required',
        ]; 
        
    }

    public function messages()
    {
        return[
            'level_id.required' => 'Elija un nivel',
            'charge_id.required' => 'Elija un cargo',
            // 'salarie_id.required' => 'Elija su salario',
            'name.required' => 'El campo nombre es obligatorio',
            'last_name.required' => 'El campo apellidos es obligatorio',
            'sex.required' => 'Seleccione su genero',
            'address.required' => 'El campo direccion es obligatorio',
            'phone.required' => 'El campo telefono es obligatorio',
            'phone.integer' => 'El campo telefono no puede ser caracteres',
            'phone.unique' => 'El numero telefonico ya se encuentra registrado',
            'email.required' => 'El campo email es obligatorio',
            'email.unique' => 'Email ya se encuentra registrado',
            'photo.mimes' => 'Solo se admite los formatos jpg,jpeg y png',
            'photo.max' => 'La imagen debe pesar maximo 1MB',
            'type_employee.required' => 'Seleccione el tipo de Empleado', 
        ];

    }
}
