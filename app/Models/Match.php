<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use Illuminate\Database\Eloquent\SoftDeletes;


class Match extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d/m/Y H:i');
    }

    protected $casts = [
        'match_date' => 'datetime:d/m/Y H:i',
    ];

    /**
     * Load the location model for this match
     */
    public function location(){
        return $this->hasOne(Location::class, 'id', 'location_id');
    }

    /**
     * Loads the results model for this match
     */
    public function results(){
        return $this->hasOne(MatchResult::class, 'id','match_result_id');
    }

    /**
     * Loads the team1 model in this match
     */
    public function team1(){
        return $this->belongsTo(Team::class, 'id', 'team1');
    }

    
    /**
     * Loads the team2 model in this match
     */
    public function team2(){
        return $this->belongsTo(Team::class, 'id', 'team2');
    }
}
