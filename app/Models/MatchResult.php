<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatchResult extends Model
{
    use HasFactory;
    use SoftDeletes;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'goals_team1',
        'goals_team2',
        'tie',
        'winning_team',
    ];

    /**
     * Loads the match model to which this result belongs to
     */
    public function match(){
        return $this->belongsTo(Match::class, 'id', 'match_result_id');
    }

    /**
     * Loads the winning team model for this result
     */
    public function winningTeam(){
        return $this->belongsTo(Team::class, 'winning_team', 'id');
    }
    
}
