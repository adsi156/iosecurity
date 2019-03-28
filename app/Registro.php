<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = "t010_registros";
    protected $primaryKey = "f010_id";
    public $timestamps = false;

    protected $fillable = [
        'f010_id',
        'f010_fecha_ingreso',
        'f010_fecha_salida',
        'f010_id_user',
        'f010_id_ambiente',
    ];
}
