<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    protected $table = "t001_propiedades";
    protected $primaryKey = "f001_id";
    public $timestamps = false;

    protected $fillable = [
        'f001_id',
        'f001_descripcion',
        'f001_ind_temp',
        'f001_ind_on_off',
    ];
}
