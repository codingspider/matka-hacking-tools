<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThaiCategory extends Model
{
    protected $table = 'thai_categories';

    public function gamePlays()
    {
        return $this->hasMany(ThaiGamePlay::class, 'category_id', 'id');
    }
}
