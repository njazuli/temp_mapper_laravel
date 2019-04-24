<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thematic extends Model
{
    protected $table = 'thematic';

    protected $fillable = ['value', 'name'];

    public function getRouteKey()
    {
        return 'id';
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'thematic_id', 'id');
    }
}