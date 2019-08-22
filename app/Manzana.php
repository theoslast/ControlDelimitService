<?php

namespace TerritoryAdmin;

use Illuminate\Database\Eloquent\Model;

class Manzana extends Model
{
    protected $table = 'tblmanzanas';
    protected $fillable = [
        'idTerritorio', 
        'letra', 
        'estado',
        'activo'
    ];
}
