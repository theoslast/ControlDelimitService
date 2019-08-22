<?php

use Illuminate\Database\Seeder;
use TerritoryAdmin\Territorio;

class TerritoriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Territorio::create([
            'idCongregacion'=> 1,
            'idEstadoTerritorio'=> 1,
            'localidad'=>'Sopocachi',
            'numero'=> '1',
            'cantidadManzanas'=> 5,
            'imagen'=> '1.jpg',
            'activo' => 1
        ]);

        Territorio::create([
            'idCongregacion'=> 1,
            'idEstadoTerritorio'=> 1,
            'localidad'=>'Tembladerani',
            'numero'=> '2',
            'cantidadManzanas'=> 6,
            'imagen'=> '2.jpg',
            'activo' => 1
        ]);

        Territorio::create([
            'idCongregacion'=> 1,
            'idEstadoTerritorio'=> 1,
            'localidad'=>'Cotahuma',
            'numero'=> '4',
            'cantidadManzanas'=> 4,
            'imagen'=> '3.jpg',
            'activo' => 1
        ]);

        Territorio::create([
            'idCongregacion'=> 2,
            'idEstadoTerritorio'=> 1,
            'localidad'=>'Centro',
            'numero'=> '12',
            'cantidadManzanas'=> 3,
            'imagen'=> 'sdacascsdfgsdbgfbdfgbdfgbd',
            'activo' => 1
        ]);

        Territorio::create([
            'idCongregacion'=> 2,
            'idEstadoTerritorio'=> 1,
            'localidad'=>'Sopocachi Bajo',
            'numero'=> '13',
            'cantidadManzanas'=> 4,
            'imagen'=> 'dgadfvsdfnynghmui,uilyuil',
            'activo' => 1
        ]);
    }
}
