<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewpageStoreRequest extends FormRequest
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
            'titulo'  => 'required',
            'contenido' =>'required|max:10000',
            'photo' => 'required|max:5120|mimes:png,jpg,jpeg',
            'fecha' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'titulo.required' => 'El campo titulo es obligatorio',
            'contenido.required' => 'El campo Contenido es obligatorio',
            'contenido.max' => 'Cantidad de caracter permitido 10000',
            'photo.required' => 'La fotografia es obligatorio',
            'photo.mimes' => 'Solo se admite los formatos jpg,jpeg y png',
            'photo.max' => 'La imagen debe pesar maximo 5MB', 
            'fecha.required' => 'Establesca una fecha',
        ];
    }
}
