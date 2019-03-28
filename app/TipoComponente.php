<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoComponente extends Model
{
    protected $table = "t002_tipos_componentes";
    protected $primaryKey = "f002_id";
    public $timestamps = false;

    protected $fillable = [
        'f002_id',
        'f002_descripcion',
        'f002_id_propiedades',
    ];
}
