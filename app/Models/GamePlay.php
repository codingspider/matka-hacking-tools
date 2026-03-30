<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GamePlay extends Model
{
    protected $table = 'game_plays';

    public function matkaCategory()
    {
        return $this->belongsTo(MatkaCategory::class, 'category', 'id');
    }
    
    public function gameTime()
    {
        return $this->belongsTo(GameTime::class, 'game_time_id', 'id');
    }
}
