<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentStoreRequest extends FormRequest
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
            'categorie' => 'required',
            'cod' => 'required|unique:documents,cod',
            'entity' => 'required',
            'description' => 'required|max:1400',
            'date_creation' => 'required',
            'file' => 'required|mimes:pdf|max:20480',
            'statu' => 'required',
        ];
    }

    public function messages()
    {
        return [
        'categorie.required' => 'Debes eligir una categoria',
        'cod.required' => 'El campo codigo es obligatorio',
        'cod.unique' => 'El codigo ya se encuentra registrado',
        'entity.required' => 'El campo entidad es obligatorio',
        'description.required' => 'El campo descripcion es obligatorio',
        'description.max' => 'La descripcion debe contener como maxima 1400 caracteres',
        'date_creation.required' => 'El campo fecha de publicacion es obligatorio',
        'file.required' => 'Debe seleccionar un archivo',
        'file.mimes' => 'El formato unico permitido es PDF',
        'file.max' => 'El archivo no debe superar los 20MB',
        'statu.required' => 'El estado del documento es obligatorio',
        ];
    }
}
