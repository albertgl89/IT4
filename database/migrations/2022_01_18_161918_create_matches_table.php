<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Team;
use App\Models\Location;
use App\Models\MatchResult;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->dateTimeTz('match_date')->unique();
            $table->foreignIdFor(Location::class)->unique();
            $table->foreignIdFor(Team::class, 'team1');
            $table->foreignIdFor(Team::class, 'team2');
            $table->foreignIdFor(MatchResult::class)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
