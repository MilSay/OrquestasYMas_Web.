<?php

namespace appOrquestas;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    //
    protected $table = 'contrato';

    protected $primaryKey = 'idContrato';

    public $timestamps = false;

    protected $fillable =[
        'idEvento',
        'FechaContrato',
        'idPersona',
        'idAgrupacion',
        'MontoInicial' ,
        'MontoTotal'      
    ];

    protected $guarded =[
        
    ];
}
