<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goals_team1 = [6,3];
        $goals_team2 = [1,3];
        $tie = [0,1];
        $winning_team = [2, null];

        for ($i = 0; $i < 2; $i++) {
            DB::table('match_results')->insert([
                'goals_team1' => $goals_team1[$i],
                'goals_team2' => $goals_team2[$i],
                'tie' => $tie[$i],
                'winning_team' => $winning_team[$i],
                'created_at' => now(),
            ]);
        }
    }
}
