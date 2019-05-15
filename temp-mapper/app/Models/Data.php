<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{

    protected $fillable = ['field_id','category_id', 'date', 'lat', 'lon', 'temp'];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function Field()
    {
        return $this->hasOne(Field::class, 'id', 'Field_id');
    }
}