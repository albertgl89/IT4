<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stadium_name = [
            'Estadio de San Mamés', 'Camp Nou',
            'Estadio Nuevo Mirandilla', 'Nuevo Los Cármenes',
            'Estadio El Sadar', 'Estadio Benito Villamarín'
        ];
        $city = ['Bilbao', 'Barcelona', 'Cádiz', 'Granada', 'Osasuna', 'Sevilla'];
        $state = ['Espanya','Espanya','Espanya','Espanya','Espanya','Espanya'];

        for ($i = 0; $i < 6; $i++) {
            DB::table('locations')->insert([
                'stadium_name' => $stadium_name[$i],
                'city' => $city[$i],
                'state' => $state[$i],
                'created_at' => now(),
            ]);
        }
    }
}
