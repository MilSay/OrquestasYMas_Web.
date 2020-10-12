<?php

namespace appOrquestas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
            'Nombres'=>'required|max:45',
            'Apellidos'=>'required|max:45',
            'Dni'=>'required|max:8|min:8',
            'GeneroId'=>'required',
            'UserName'=>'required|max:45|unique:persona',
            'password'=>'required|max:191',
            'Celular'=>'required|max:9|min:9',
            'Foto'=>'mimes:jpeg,jpg,bmp,png',
            'Email'=>'required|email|max:45|unique:persona',
        ];
    }
}
