<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    protected $table = "t011_alertas";
    protected $primaryKey = "f011_id";
    public $timestamps = false;

    protected $fillable = [
        'f011_id',
        'f011_nombre',
        'f011_descripcion',
        'f011_id_usuario',
        'f001_id_registro',
    ];
}
