<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $match_date = [
            Date::create(2022,04,12,20,00,00),
            Date::create(2022,01,15,21,00,00),
            Date::create(2021,12,27,20,30,00),
            Date::create(2022,01,01,15,00,00),
            Date::create(2022,06,16,19,30,00),
            Date::create(2022,01,31,21,30,00)
        ];

        $location_id = [rand(1,6),rand(1,6),rand(1,6),rand(1,6),rand(1,6),rand(1,6)];
        
        $team1 = [1,2,3,4,5,6];
        $team2 = [5,4,1,1,3,2];

        $match_result_id = [null,1,2,null,null,null];

        for ($i = 0; $i < 6; $i++) {
            DB::table('matches')->insert([
                'match_date' => $match_date[$i],
                'location_id' => $location_id[$i],
                'team1' => $team1[$i],
                'team2' => $team2[$i],
                'match_result_id' => $match_result_id[$i],
                'created_at' => now(),
            ]);
        }
    }
}
