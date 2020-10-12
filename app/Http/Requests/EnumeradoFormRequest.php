<?php

namespace appOrquestas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnumeradoFormRequest extends FormRequest
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
            //
            'Nombre'=>'required|max:150',
            'Valor_enumerado'=>'required|max:11',
            'Tipo_Enumerado'=>'required|max:50',
            'Estado_Enumerado'=>'required|max:1',
        ];
    }
}
