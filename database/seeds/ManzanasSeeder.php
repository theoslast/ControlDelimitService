<?php

use Illuminate\Database\Seeder;
use TerritoryAdmin\Manzana;

class ManzanasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manzana::create([
            'idTerritorio'=> 1, 'letra'=> 'a', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 1, 'letra'=> 'b', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 1, 'letra'=> 'c', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 1, 'letra'=> 'd', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 1, 'letra'=> 'e', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 2, 'letra'=> 'a', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 2, 'letra'=> 'b', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 2, 'letra'=> 'c', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 2, 'letra'=> 'd', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 2, 'letra'=> 'e', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 2, 'letra'=> 'f', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 4, 'letra'=> 'a', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 4, 'letra'=> 'b', 'estado'=> 0, 'activo'=> 1
        ]);
        Manzana::create([
            'idTerritorio'=> 4, 'letra'=> 'c', 'estado'=> 0, 'activo'=> 1
        ]);
    }
}
