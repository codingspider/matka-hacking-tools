<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bazar extends Model
{
    protected $table = 'bazars';

    public function gameTimes()
    {
        return $this->hasMany(GameTime::class, 'bazar_id', 'id');
    }
}
