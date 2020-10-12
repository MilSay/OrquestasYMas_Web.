<?php

namespace appOrquestas;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'persona';
    protected $primaryKey = 'idPersona';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'Nombres', 'Apellidos', 'Dni',
        'GeneroId', 'FechaNacimiento', 'Celular',
        'Email', 'UserName', 'password',
        'CodigoDepartamento', 'CodigoProvincia', 'CodigoDistrito',
        'Foto', 'FechaRegistro','idRol',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
