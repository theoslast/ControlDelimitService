<?php

namespace TerritoryAdmin;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'tblUsuarios';
    protected $fillable = [
        'nombre', 
        'apellido', 
        'usuario',
        'contrasenia',
        'activo',
    ];
}
