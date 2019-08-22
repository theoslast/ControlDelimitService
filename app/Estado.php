<?php

namespace TerritoryAdmin;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'tblestados';
    protected $fillable = [
        'estado', 
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function territorios() 
    {
        return $this->hasMany(Territorio::class);
    }
}
