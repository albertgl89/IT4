<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    /**Loads the team of the player */
    public function team() {
        return $this->belongsTo(Team::class);
    }
}
