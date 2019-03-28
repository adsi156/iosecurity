<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponenteConfig extends Model
{
    protected $table = "t007_componente_config";
    protected $primaryKey = "f007_id";
    public $timestamps = false;

     protected $fillable = [
        'f007_id',
        'f007_nombre',
        'f007_decripcion',
        'f007_valor_on_off',
        'f007_valor_temp',
        'f007_id_componente',
        'f007_id_horario'
    ];
}
