<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CongregacionesSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(TerritoriosSeeder::class);
        $this->call(ManzanasSeeder::class);
    }
}
