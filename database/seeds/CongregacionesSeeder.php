<?php

use Illuminate\Database\Seeder;
use TerritoryAdmin\Congregacion;

class CongregacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Congregacion::create([
            'nombre'=> 'Alto Sopocachi',
            'codigo'=> '2172',
            'password'=>'admin123.',
            'circuito'=> '2',
            'publicadores'=> 78,
            'territorios' => 35,
            'imagen' => 'Congregacion1.jpg',
            'activo'=> 1
        ]);

        Congregacion::create([
            'nombre'=> 'Sopocachi',
            'codigo'=> '2171',
            'password'=>'admin123.',
            'circuito'=> '2',
            'publicadores'=> 80,
            'territorios' => 35,
            'imagen' => 'Congregacion1.jpg',
            'activo'=> 1
        ]);

        Congregacion::create([
            'nombre'=> 'Llojeta',
            'codigo'=> '2170',
            'password'=>'admin123.',
            'circuito'=> '2',
            'publicadores'=> 82,
            'territorios' => 35,
            'imagen' => 'Congregacion1.jpg',
            'activo'=> 1
        ]);

        Congregacion::create([
            'nombre'=> 'Las Palmas',
            'codigo'=> '2173',
            'password'=>'admin123.',
            'circuito'=> '2',
            'publicadores'=> 76,
            'territorios' => 35,
            'imagen' => 'Congregacion1.jpg',
            'activo'=> 1
        ]);
    }
}
