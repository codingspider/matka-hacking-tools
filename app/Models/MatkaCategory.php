<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatkaCategory extends Model
{
    protected $table = 'game_categories';

    public function gamePlays()
    {
        return $this->hasMany(GamePlay::class, 'category', 'id');
    }
}
