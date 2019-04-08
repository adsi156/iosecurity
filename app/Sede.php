<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = "t004_sede";
    protected $primaryKey = "f004_id";
    public $timestamps = false;

    protected $fillable = [
        'f004_nombre',
        'f004_descripcion',
    ];
}
