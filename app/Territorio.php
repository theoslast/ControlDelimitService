<?php

namespace TerritoryAdmin;

use Illuminate\Database\Eloquent\Model;

class Territorio extends Model
{
    protected $table = 'tblterritorios';
    protected $fillable = [
        'idCongregacion', 
        'idEstadoTerritorio', 
        'localidad',
        'numero',
        'cantidadManzanas',
        'imagen',
        'activo'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'idEstadoTerritorio');
    }
}
