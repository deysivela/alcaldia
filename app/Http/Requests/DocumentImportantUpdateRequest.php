<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentImportantUpdateRequest extends FormRequest
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
            'categorie'      => 'required',
            'name_document'  => 'required|unique:documents,name_document,'.$this->document->id,
            'data_document'  => 'required',
            // 'description' => 'required|max:500',
            'date_creation'  => 'required',
            'file'           => 'mimes:pdf|max:61440',
        ];
    }

    public function messages()
    {
        return [
            'categorie.required' => 'Debe seleccionar una categoria',
            'name_document.required' => 'El campo Nombre de Documentos es Importantes',
            'name_document.unique' => 'Ya se encuentra un registro con el mismo nombre, Por tanto no puede haber diplicados',
            // 'description.required' => 'El campo descripcion es obligatorio',
            // 'description.max' => 'La descripcion debe contener como maxima 500 caracteres',
            'data_document.required' => 'El campo datos del Documento es obligatorio',
            // 'file.required' => 'Debe seleccionar un archivo',
            'file.mimes' => 'El formato unico permitido es PDF',
            'file.max' => 'El archivo no debe superar los 60MB',
        ];
    }
}
