<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'fields';

    protected $fillable = ['value', 'name'];

    public function getRouteKey()
    {
        return 'id';
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'Field_id', 'id');
    }
}