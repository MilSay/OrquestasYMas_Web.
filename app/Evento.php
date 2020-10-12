<?php

namespace appOrquestas;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    protected $table = 'evento';

    protected $primaryKey = 'idEvento';

    public $timestamps = false;

    protected $fillable =[
        'Fecha',
        'LocalDeEvento',
        'DireccionLocal',
        'TipoEventoId',
        'TipoEntradaId' ,
        'EstadoEventoId' ,
        'HoraInicio',
        'HoraFin'           
    ];

    protected $guarded =[
        
    ];
}
