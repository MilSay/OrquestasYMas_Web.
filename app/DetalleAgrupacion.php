<?php

namespace appOrquestas;

use Illuminate\Database\Eloquent\Model;

class DetalleAgrupacion extends Model
{
    //
    protected $table = 'detalleagrupacion';

    protected $primaryKey = 'idDetalleAgrupacion';

    public $timestamps = false;

    protected $fillable =[
        'idAgrupacion',
        'idPersona',
        'TipoPersona',       
        'FechaRegistro',        
    ];

    protected $guarded =[
        
    ];
}
