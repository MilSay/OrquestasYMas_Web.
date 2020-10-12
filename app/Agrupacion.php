<?php

namespace appOrquestas;

use Illuminate\Database\Eloquent\Model;

class Agrupacion extends Model
{
    //
    protected $table = 'agrupacion';

    protected $primaryKey = 'idAgrupacion';

    public $timestamps = false;

    protected $fillable =[
        'RazonSocial',
        'Ruc',
        'FechaCreacion',
        'Historia',
        'CodigoDepartamento',
        'CodigoProvincia',
        'CodigoDistrito',
        'GeneroMusical',
        'Foto',
        'facebook',
        'twitter',
        'youtuve',
        'idPersona',      
        'direccion',
    ];

    protected $guarded =[
        
    ];
}
