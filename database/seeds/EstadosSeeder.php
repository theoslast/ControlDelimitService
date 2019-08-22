<?php

use Illuminate\Database\Seeder;
use TerritoryAdmin\Estado;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'id'=> 1,
            'estado'=> 'PENDIENTE',
        ]);

        Estado::create([
            'id'=> 2,
            'estado'=> 'INCOMPLETO',
        ]);

        Estado::create([
            'id'=> 3,
            'estado'=> 'TERMINADO',
        ]);
    }
}
