<?php

namespace appOrquestas\Http\Controllers\Auth;

use appOrquestas\User;
use appOrquestas\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'contrato/agrupacion';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Nombres' => ['required', 'string', 'max:45'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:persona'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \appOrquestas\User
     */
    protected function create(array $data)
    {
        return User::create([
            'Nombres' => $data['Nombres'],
            'Apellidos' => $data['Apellidos'],
            'Dni' => $data['Dni'],
            'GeneroId' => $data['GeneroId'],
            'FechaNacimiento' => $data['FechaNacimiento'],
            'Celular' => $data['Celular'],
            'Email' => $data['Email'],
            'UserName' => $data['UserName'],
            'CodigoDepartamento' => $data['CodigoDepartamento'],
            'CodigoProvincia' => $data['CodigoProvincia'],
            'CodigoDistrito' => $data['CodigoDistrito'],            
            'Foto' => $data['Foto'],
            'FechaRegistro' => $data['FechaRegistro'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
