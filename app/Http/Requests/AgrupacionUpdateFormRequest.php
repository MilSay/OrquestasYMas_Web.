<?php

namespace appOrquestas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgrupacionUpdateFormRequest extends FormRequest
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
           
            'RazonSocial'=>'required|max:50',
            'Ruc'=>'required|max:11|min:11',
            'Foto'=>'mimes:jpeg,jpg,bmp,png',
        ];
    }
}
