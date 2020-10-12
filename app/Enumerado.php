<?php

namespace appOrquestas;

use Illuminate\Database\Eloquent\Model;

class Enumerado extends Model
{
    //
    protected $table = 'enumerado';

    protected $primaryKey = 'idEnumerado';

    public $timestamps = false;

    protected $fillable =[
        'Nombre',
        'Valor_enumerado',
        'Tipo_Enumerado',
        'Estado_Enumerado'        
    ];
    protected $guarded =[
        
    ];

}
