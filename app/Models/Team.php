<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'short_name',
        'city',
    ];

    /**
     * Load the location model for this team
     */
    public function location(){
        return $this->belongsTo(Location::class, 'city', 'id');
    }

    /**
     * Load matches where this team has taken part in as team 1
     */
    public function matchT1(){
        return $this->hasMany(Match::class, 'team1', 'id');
    }

    /**
     * Load matches where this team has taken part in as team 2
     */
    public function matchT2(){
        return $this->hasMany(Match::class, 'team2', 'id');
    }

    /**
     * Load matches where this team has taken part in the past
     */
    public function countMatches(){
        $asTeam1 = $this->matchT1()->where('match_date','<', now())->count();
        $asTeam2 = $this->matchT2()->where('match_date','<', now())->count();;
        $result = $asTeam1+$asTeam2;
        return $result;
    }

    /**
     * Load the results where this team has won
     */
    public function wins(){
        return $this->hasMany(MatchResult::class, 'winning_team', 'id');
    }

    /**
     * Returns the number of times where this team has tied
     */
    public function ties(){
        $ties = 0;
        $asT1 = $this->matchT1()->withTrashed()->get();
        $asT2 = $this->matchT2()->withTrashed()->get();
        foreach($asT1 as $match){
            $results = MatchResult::find($match->match_result_id);
            if (isset($results->tie) && $results->tie == true){
                $ties++;
            }
        }
        foreach($asT2 as $match){
            $results = MatchResult::find($match->match_result_id);
            if (isset($results->tie) && $results->tie == true){
                $ties++;
            }
        }
        return $ties;
    }

    /**
     * Returns the number of times where this team has lost
     */
    public function losses(){
        $tieNumber = $this->ties();
        $totalMatches = $this->countMatches();
        $totalWins = $this->wins()->count();
        return $totalMatches - $tieNumber - $totalWins;
    }
}
