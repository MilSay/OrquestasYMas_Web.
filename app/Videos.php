<?php

namespace appOrquestas;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    //
    protected $table = 'videos';

    protected $primaryKey = 'idVideos';

    public $timestamps = false;

    protected $fillable =[
        'idAgrupacion',
        'link',
        'Descripcion',       
        'FechaRegistro',        
    ];

    protected $guarded =[
        
    ];
}
