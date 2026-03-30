<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameTime extends Model
{
    protected $table = 'game_times';

    public function bazar()
    {
        return $this->belongsTo(Bazar::class, 'bazar_id', 'id');
    }

    public function gamePlays()
    {
        return $this->hasMany(GamePlay::class, 'game_time_id', 'id');
    }
}
