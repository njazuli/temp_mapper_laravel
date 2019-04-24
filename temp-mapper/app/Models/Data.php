<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{

    protected $fillable = ['thematic_id','category_id', 'date', 'lat', 'lon', 'temp'];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function thematic()
    {
        return $this->hasOne(Thematic::class, 'id', 'thematic_id');
    }
}