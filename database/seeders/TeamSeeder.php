<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Athletic Club de Bilbao', 'FC Barcelona', 'Cádiz Club de Fútbol', 'Granada Club de Fútbol', 'Club Atlético Osasuna', 'Real Betis Balompié'];
        $short_name = ['ATH', 'FCB', 'CCF', 'GCF', 'CAO', 'RBB'];
        $city = [1,2,3,4,5,6];

        for($i = 0; $i < 6; $i++) {
            DB::table('teams')->insert([
                'name'=>$name[$i],
                'short_name'=>$short_name[$i],
                'city'=>$city[$i],
                'created_at' => now(),
            ]);
        }
    }
}
