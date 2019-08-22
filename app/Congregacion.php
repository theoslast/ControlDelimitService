<?php

namespace TerritoryAdmin;

use Illuminate\Database\Eloquent\Model;

class Congregacion extends Model
{
    protected $table = 'tblcongregaciones';
    protected $fillable = [
        'nombre', 
        'codigo', 
        'password',
        'circuito',
        'publicadores',
        'territorios', 
        'imagen',
        'activo'
    ];
}
