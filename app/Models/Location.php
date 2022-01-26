<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory;
    use SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'city',
        'state',
        'stadium_name',
    ];

    /**
     * Load the teams models associated with this location
     */
    public function teams(){
        return $this->hasMany(Team::class, 'city', 'id');
    }

    /**
     * Load the matches associated with this location
     */
    public function matches(){
        return $this->belongsTo(Match::class, 'location_id', 'id');
    }

}
