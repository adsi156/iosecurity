<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "t006_roles";
    protected $primaryKey = "f006_id";
    public $timestamps = false;

    protected $fillable = [
        'f006_nombre',
        'f006_descripcion',
    ];
}
