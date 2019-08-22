<?php

namespace TerritoryAdmin;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = 'tblobservaciones';
    protected $fillable = [
        'idTerritorio', 
        'manzana', 
        'observacion',
        'activo'
    ];
}
