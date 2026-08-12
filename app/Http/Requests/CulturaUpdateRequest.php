<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CulturaUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'categorie' => 'required',
            'cod' => 'required|unique:documents,cod,' . $this->document->id,
            'entity' => 'required',
            'description' => 'required|max:1400',
            'date_creation' => 'required',
            'file' => 'mimes:pdf,jpg,jpeg,png|max:10240',
            'statu' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'categorie.required' => 'Debes elegir una categoria',
            'cod.required' => 'El campo codigo es obligatorio',
            'cod.unique' => 'El codigo ya se encuentra registrado',
            'entity.required' => 'El titulo / actividad es obligatorio',
            'description.required' => 'El campo descripcion es obligatorio',
            'description.max' => 'La descripcion debe contener como maximo 1400 caracteres',
            'date_creation.required' => 'El campo fecha de publicacion es obligatorio',
            'file.mimes' => 'Formatos permitidos: PDF, JPG, JPEG o PNG',
            'file.max' => 'El archivo no debe superar los 10MB',
            'statu.required' => 'El estado del documento es obligatorio',
        ];
    }
}
