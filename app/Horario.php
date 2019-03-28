<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = "t008_horarios";
    protected $primaryKey = "f008_id";
    public $timestamps = false;

    protected $fillable = [
        'f008_id',
        'f008_nombre',
        'f008_descripcion',
        'f008_fecha_inicio',
        'f008_fecha_fin',
        'f008_id_ambiente',
        'f008_id_usuario',
    ];
}
