<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    protected $table = "t003_componentes";
    protected $primaryKey = "f003_id";
    public $timestamps = false;

    protected $fillable = [
        'f003_descripcion',
        'f003_ind_estado',
        'f003_id_tipo_componente',
        'f003_id_ambiente',
    ];
}
