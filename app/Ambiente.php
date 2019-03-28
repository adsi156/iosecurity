<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $table = "t005_ambientes";
    protected $primaryKey = "f005_id";
    public $timestamps = false;

    protected $fillable = [
        'f005_id',
        'f005_nombre',
        'f005_descripcion',
        'f005_capacidad',
        'f005_id_sede',
    ];
}
