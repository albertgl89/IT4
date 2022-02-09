<?php

namespace Database\Seeders;

use App\Models\Player;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            TeamSeeder::class,
            LocationSeeder::class,
            MatchSeeder::class,
            MatchResultSeeder::class,
            PermissionsSeeder::class,
            
        ]);
        Player::factory()->count(25)->create();
    }
}
