<?php

namespace TerritoryAdmin;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'tblregistros';
    protected $fillable = [
        'idTerritorio', 
        'conductor', 
        'fecha',
        'manzanas',
        'observacion',
        'activo'
    ];
}
