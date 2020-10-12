<?php

namespace appOrquestas;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table = 'persona';

    protected $primaryKey = 'idPersona';

    public $timestamps = false;

    protected $fillable =[
        'Nombres',
        'Apellidos',
        'Dni',
        'GeneroId',
        'FechaNacimiento' ,
        'Celular' ,
        'Email',
        'UserName',
        'password' ,
        'CodigoDepartamento',
        'CodigoProvincia',
        'CodigoDistrito' ,
        'Foto' ,
        'FechaRegistro' ,  
        'idRol',                  
    ];

    protected $guarded =[
        
    ];
}
