<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponenteConfig extends Model
{
    protected $table = "t009_componente_config";
    protected $primaryKey = "f009_id";
    public $timestamps = false;

     protected $fillable = [
        'f009_nombre','f009_decripcion','f009_valor_on_off','f009_valor_temp','f009_id_componente',
        'f009_id_horario'
    ];
}
