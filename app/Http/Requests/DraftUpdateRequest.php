<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DraftUpdateRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'name' => 'required',
            'place' => 'required',
            'type' => 'required',
            'photo' => 'max:1024|mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'El campo nombre es obligatorio',
            'place.required' => 'El campo lugar es obligatorio',
            'type.required' => 'El campo tipo es obligatorio',
            'photo.mimes' => 'Solo se admite los formatos jpg,jpeg y png',
            'photo.max' => 'La imagen debe pesar maximo 1MB', 
        ];
    }
}
