<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThaiGamePlay extends Model
{
    protected $table = 'thai_game_plays';

    public function category()
    {
        return $this->belongsTo(ThaiCategory::class, 'category_id', 'id');
    }
}
