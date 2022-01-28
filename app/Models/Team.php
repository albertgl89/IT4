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
     * Load matches where this team has taken part in
     */
    public function matches(){
        $asTeam1 = $this->hasMany(Match::class, 'team1', 'id');
        $asTeam2 = $this->hasMany(Match::class, 'team2', 'id');
        $merged = $asTeam1->merge($asTeam2);
        return $merged;
    }

    /**
     * Load the results where this team has won
     */
    public function wins(){
        return $this->hasMany(MatchResults::class, 'winning_team', 'id');
    }
}
